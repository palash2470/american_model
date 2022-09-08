<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    public function ShowLogin()
    {
        return view('admin.auth.login');
    }
    public function DoLogin(Request $request)
    {
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember_me') ? true : false;
        //dd($request->all());
        if(auth()->attempt(['email' => $input['email'], 'password' => $input['password'],'user_type'=>'1'],$remember_me))
        {
            if (auth()->user()->user_type == 1) {
                return redirect()->route('admin');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('admin.login')
                ->with('error','Email-Address And Password Are Wrong !.');
        }
    }
}
