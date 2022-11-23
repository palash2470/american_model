<?php

namespace App\Http\Controllers;

use App\Models\ProfileView;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPlan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = User::where('id',Auth::user()->id)->first();
            /* $plan_expire_users = UserPlan::where('status',1)->where('user_id',Auth::user()->id)->whereDate('expiry', '<', Carbon::now())->first();
            if($plan_expire_users){
                return redirect()->route('user.registration.plan')->with('error','Your plan expire.Please select a plan');
            } */
            return view('dashboard',compact('user'));
        }
        return redirect()->route('login')->with('error','Opps! You do not have access');
    }

   public function analyticsBasic(){
        return view('analytics.basic');
   }
}
