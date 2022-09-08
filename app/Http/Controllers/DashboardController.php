<?php

namespace App\Http\Controllers;

use App\Models\ProfileView;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = User::where('id',Auth::user()->id)->first();
            return view('dashboard',compact('user'));
        }
        return redirect()->route('login')->with('error','Opps! You do not have access');
    }

   public function analyticsBasic(){
        return view('analytics.basic');
   }
}
