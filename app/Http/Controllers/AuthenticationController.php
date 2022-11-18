<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class AuthenticationController extends Controller
{
    //User login page
    public function showLogin()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function registration(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    
    //User Signup data store
    public function doRegistration(Request $request){
        //dd($request->name);
        $validator = Validator::make($request->all(), [
            //'email' => 'required|email|unique:users',
            'agree' => 'accepted',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required',
            'email' => ['required','email', Rule::unique('users')->where(function ($query) use ($request) {
                return $query->where('is_email_verified', 1);
            })],
        ]);
        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        } 
        DB::beginTransaction();
        try{
            //email not verified user delete
            User::where('email',$request->email)->where('is_email_verified',0)->delete();
            $model_id = '888888';
            $latest_id = User::orderBy('created_at','DESC')->first();
            //echo $latest_id->model_id;die;
            if($latest_id){
                $model_id = ((int)$latest_id->model_id + 1);
            }
            //Data store in Users table
            $token = Str::random(64);
            $user = User::create([
                'email'     =>$request->email,
                'password'  => Hash::make($request->password),
                'user_type' => '2',
                'model_id' => $model_id,
                'status' => '0',
                'ip_address' => $request->ip(),
                'email_verify_token'  => $token,
            ]);
            
            //Email send to user for email Verification
            Mail::send('emails.auth.emailVerification', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });
            $email = Crypt::encryptString($request->email);
            DB::commit();
            return view('auth.verify',compact('email')); 
            //return redirect()->route('email.verify')->with('success','Great! You have Successfully Signup !');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','something went wrong!');
        }
    }

    //resend email verification link
    public function resendVerifyEmail(){
        try{
            $email = request()->slug;
            $decr_email = Crypt::decryptString($email);
            $user = User::where('email',$decr_email)->first();
            if($user){
                if($user->is_email_verified == 1){
                    return redirect('login')->with('success','Your e-mail is already verified. You can now login.');
                }else{
                    $token = Str::random(64);
                    $user->email_verify_token = $token;
                    $user->save();
                    Mail::send('emails.auth.emailVerification', ['token' => $token], function($message) use($user){
                        $message->to($user->email);
                        $message->subject('Email Verification Mail');
                        });
                    return view('auth.verify',compact('email'));   
                }
            }    
            return redirect()->back()->with('error','something went wrong!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','something went wrong!');
        }
    }

    public function showVerifyEmail(){
        
        return view('auth.verify');
    }

    public function verifyAccount($token){

        $verifyUser = User::where('email_verify_token',$token)->first();
        $message = 'Sorry your email cannot be identified.';
        if($verifyUser){
            if($verifyUser->is_email_verified === 0) {
                $verifyUser->is_email_verified = 1;
                $verifyUser->save();
                $message = "Your e-mail is verified. You can now login.";
                Mail::send('emails.wellcome',['user'=>$verifyUser], function($message) use($verifyUser){
                    $message->to($verifyUser->email);
                    $message->subject('Welcome Mail');
                });
                Mail::send('emails.admin_new_registration',['user'=>$verifyUser], function($message) use($verifyUser){
                    $message->to('admin@gmail.com');
                    $message->subject('New Registration ');
                });    
                return view('auth.successVerifyEmail');   
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('success', $message);

    }

    //user login
    public function doLogin(Request $request){
        //dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if(auth()->attempt(['email' => $credentials['email'], 'password' => $credentials['password'],'user_type'=>'2']))
        {   
            //echo $request->ip();die;
            User::where('id',Auth::user()->id)->update(['last_active' => Carbon::now(),'ip_address' => $request->ip()]);
            if(Session::has('url_back')){
                return Redirect::to(Session::get('url_back'));
            }
            return redirect('/dashboard');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong !.');
        }
    }

    //forgot password
    public function showForgetPasswordForm(){
        return view('auth.passwords.forgetPassword');
    }

    //save password resetdata and send resend link
    public function submitForgetPasswordForm(Request $request){
        //dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('emails.auth.forgotPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');

    }

    public function showResetPasswordForm($token){

        return view('auth.passwords.reset',['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            //'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'token' => $request->token
                            ])
                            ->first();
        //dd($updatePassword);                        
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

        return redirect()->route('login')->with('success', 'Your password has been changed!');
    }
    
    //user logout
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect()->route('login')->with('success','You have Successfully Logged Out');
    }

    
}
