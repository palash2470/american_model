<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;
use App\Models\PlanGroup;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\UserPlanDetails;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Session;
use Stripe;
class PaymentController extends Controller
{
    public function payment($user_plan_enc){
        $user_plan_id =  decrypt($user_plan_enc);
        $user_plan = UserPlan::where('id',$user_plan_id)->first();
        if($user_plan){
            return view('payment.payment',compact('user_plan','user_plan_enc'));
        }else{
            abort(404);
        } 
    }

    public function paymentProcess(Request $request){

        $request->validate([
            'user_plan' => 'required',
            'pay_method' => 'required',
        ]);
        $user_plan_id =  decrypt($request->user_plan);
        $user_plan = UserPlan::where('id',$user_plan_id)->first();
        $payment = Payment::create([
            'user_id'=>Auth::user()->id,
            'user_plan_id'      => $user_plan->id,
            'price'             => $user_plan->price,
            'total_price'       => $user_plan->price,
            'payment_type'      => $request->pay_method,
            'payment_status'    => 'pending',
        ]);
        if($request->pay_method == 'paypal'){
            return  $this->paypalPayment($user_plan,$payment->id);
        }elseif($request->pay_method == 'card'){
            $countres = Country::all();
            $enc_plan_id = $request->user_plan;
            $user = Auth::user();
            $payment_id = encrypt($payment->id);
            return view('payment.stripe',compact('enc_plan_id','countres','user','user_plan','payment_id'));
        }
    }

    public function paypalPayment($user_plan,$payment_id){
        //echo $payment_id;die;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($user_plan->price,2),
                    ]
                ]
            ]
        ]);
        //dd($response);
        if (isset($response['id']) && $response['id'] != null) {

            //Payment table update trns id    
            Payment::where('id', $payment_id)
            ->update(['transaction_id'=> $response['id']]);
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->back()
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->back()
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
        //return 'success';
    }

     /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //update responce status
            Payment::where('transaction_id', $response['id'])
            ->update(['payment_status'=> $response['status']]);
            
            $payment = Payment::where('transaction_id', $response['id'])->first();
            $user_plan = UserPlan::where('id',$payment->user_plan_id)->first();
            //update user premium-member-placement
            $premium_member_placement = 'no';
            $user_plan_details = UserPlanDetails::where('user_id',Auth::user()->id)
                ->where('user_plan_id',$user_plan->id)
                ->where('attribute_slug','premium-member-placement')
                ->first(); 
            //dd($user_plan_details);
            if(isset($user_plan_details) && $user_plan_details->value == 'yes'){
                $premium_member_placement = 'yes';
            }
            User::where('id',Auth::user()->id)->update(['is_subscribe'=>1,'is_payment'=>1,'premium_member_placement'=>$premium_member_placement]);
            //return view('finishPayment');
            Mail::send('emails.subscription', ['user_plan' => $user_plan], function($message) use($user_plan){
                $message->to($user_plan->user->email);
                $message->subject('Subscription');
            });
            return redirect()->route('payment.success')->with('success', 'Transaction complete.');
        } else {
            return redirect()
            ->route('user.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        Payment::where('transaction_id', $request['token'])
        ->update(['payment_status'=> 'CANCEL']);
        return redirect()->route('dashboard')->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    //Stripe palyment
    public function stripePost(Request $request){
        //dd($request->all());
        $user_plan_id =  decrypt($request->plan);
        $payment_id =  decrypt($request->payment);
        //$payment = Payment::where('id',$payment_id)->first();
        $user_plan = UserPlan::where('id',$user_plan_id)->first();
        //echo round($user_plan->price);die;
        if(isset($user_plan)){
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            try {
                $payment = $stripe->charges->create([
                    'shipping' => [
                        'name' => $request->name,
                        'address' => [
                        'line1' => $request->address,
                        'postal_code' => $request->zip_code,
                        'city' => $request->city,
                        'state' => $request->state ? Helper::getDataById('App\Models\State','id',$request->state)->name : '',
                        'country' => $request->country ? Helper::getDataById('App\Models\Country','id',$request->country)->iso : '',
                        ],
                    ],
                    'amount' => $user_plan->price*100,
                    //'amount' => 10,
                    'currency' => 'usd',
                    'source' => $request->stripeToken,
                    'description' => 'Subscription',
                    //"metadata" => ["order_id" => "6735"]
                ]);
                
                if($payment['status'] == 'succeeded') {
                    Payment::where('id', $payment_id)
                    ->update(['payment_status'=> 'COMPLETED','transaction_id'=>$payment['id']]);
                    //update user plan detais
                    $premium_member_placement = 'no';
                    $user_plan_details = UserPlanDetails::where('user_id',Auth::user()->id)
                        ->where('user_plan_id',$user_plan->id)
                        ->where('attribute_slug','premium-member-placement')
                        ->first(); 
                    //dd($user_plan_details);
                    if(isset($user_plan_details) && $user_plan_details->value == 'yes'){
                        $premium_member_placement = 'yes';
                    }
                    User::where('id',Auth::user()->id)->update(['is_subscribe'=>1,'is_payment'=>1,'premium_member_placement'=>$premium_member_placement]);
                    
                    
                    Mail::send('emails.subscription', ['user_plan' => $user_plan], function($message) use($user_plan){
                        $message->to($user_plan->user->email);
                        $message->subject('Subscription');
                    });
                    return redirect()->route('payment.success');
                }else{
                    Session::flash('error', 'Something went wrong!');
                    return back();
                } 
            } catch(\Stripe\Exception\CardException $e) {
                Session::flash('error', "A payment error occurred: {$e->getError()->message}");
                return back();
                //error_log("A payment error occurred: {$e->getError()->message}");
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                Session::flash('error', "An invalid request occurred.: {$e->getError()->message}");
                return back();
                //error_log("An invalid request occurred.");
            } catch (Exception $e) {
                Session::flash('error', "Another problem occurred, maybe unrelated to Stripe.");
                return back();
                //error_log("Another problem occurred, maybe unrelated to Stripe.");
            }    
        }else{
            Session::flash('error', 'Something went wrong!');
            return back();
        }
       
    }

    public function successPayment(){
        return view('payment.success');
    }

}
