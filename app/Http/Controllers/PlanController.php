<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;
use App\Models\PlanGroup;
use App\Models\Settings;
use Exception;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function showRegPlan(){
        $plan_groups = PlanGroup::all();
        $settings = Settings::find(1);
        return view('plan.reg_plan',compact('plan_groups','settings'));
    }

    public function showSubscriptionPlan(){
        $plan_groups = PlanGroup::all();
        $settings = Settings::find(1);
        return view('plan.subscription_plan',compact('plan_groups','settings'));
    }
}
