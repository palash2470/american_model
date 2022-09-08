<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;
use App\Models\PlanGroup;
use Exception;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function showRegPlan(){
        $plan_groups = PlanGroup::all();
        return view('plan.reg_plan',compact('plan_groups'));
    }

    public function showSubscriptionPlan(){
        $plan_groups = PlanGroup::all();
        return view('plan.subscription_plan',compact('plan_groups'));
    }
}
