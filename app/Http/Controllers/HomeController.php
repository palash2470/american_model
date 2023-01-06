<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\HomeBanner;
use App\Models\NewsLetter;
use App\Models\Plan;
use App\Models\PlanDetails;
use App\Models\Polls;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\UserPlanDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //Start all user expire plan
        /* $plan_expire_users = UserPlan::where('status',1)->whereDate('expiry', '<', Carbon::now())->get();
        //dd($plan_expire_users);
        if(count($plan_expire_users) > 0){
                foreach($plan_expire_users as $plan_expire){
                        //get free plan id
                        $get_free_plan = Plan::where('plan_group_id',$plan_expire->plan_group_id)->where('name','Free')->first();
                        //dd($get_free_plan);
                        //get plan details
                        $planDetails = PlanDetails::where('plan_id',$get_free_plan->id)
                                ->where('plan_group_id',$get_free_plan->plan_group_id)
                                ->get();

                        //dd($planDetails);
                        if($planDetails && count($planDetails) > 0){
                                $price = 0;
                                $expiry = '';
                                // if($request->plan_type == 'monthly'){
                                    $price = $planDetails[0]->monthly_value;
                                    $expiry = Carbon::now()->addMonth();
                                // }else if($request->plan_type == 'yearly'){
                                //     $price = $planDetails[0]->yearly_value;
                                //     $expiry = Carbon::now()->addYear();
                                // }
                                $user_plan = UserPlan::create([
                                    'user_id' => $plan_expire->user_id,
                                    'plan_group_id' => $plan_expire->plan_group_id,
                                    'plan_id' => $get_free_plan->id,
                                    'plan_type' => 'monthly',
                                    'price' => $price,
                                    'expiry' => $expiry,
                                ]);
                                $planDetailsArr=[];
                                foreach($planDetails as $plan_detail){
                                    //if($request->plan_type == 'monthly'){
                                        $value = $plan_detail->monthly_value;
                                //     }else if($request->plan_type == 'yearly'){
                                //         $value = $plan_detail->yearly_value;
                                //     }
                                    $planDetailsArr[] = [
                                        'user_id' => $plan_expire->user_id,
                                        'user_plan_id' => $user_plan->id,
                                        'attribute_name' => $plan_detail->attribute->name,
                                        'attribute_slug' => $plan_detail->attribute->slug,
                                        'value' => $value,
                                        'created_at' => Carbon::now(),
                                    ];
                                }
                                UserPlanDetails::insert($planDetailsArr);

                                User::where('id',$plan_expire->user_id)->update(['premium_member_placement'=> 'no' ]);
                                UserPlan::where('id',$plan_expire->id)->update(['status'=> 0]);
                                
                        }
                }
               
        } */
        //dd($user_plan_expire);       
        //End expire plan check
        $banners = HomeBanner::where('status',1)->get();
        $settings = Settings::find(1);
        $fixed_advertisements = Advertisement::all();
        $advertisements = Advertisement::skip(2)->take(20)->get();
        $poll = Polls::where('status',1)->first();
        $newestFaces = User::where('is_subscribe',1)
                    //->where('membership_id',1)
                    ->where('status',1)
                    ->latest('created_at')
                    ->take(8)
                    ->get(); 
        $childModels = User::where('is_subscribe',1)
                ->where('membership_id',4)
                ->where('status',1)
                ->latest('created_at')
                ->take(5)
                ->get();
        $photographers =  User::where('is_subscribe',1)
                ->where('membership_id',2)
                ->where('status',1)
                ->latest('created_at')
                ->take(4)
                ->get();
        $featureModels =  User::where('is_subscribe',1)
                ->where('membership_id',1)
                ->where('feature_model',1)
                ->where('status',1)
                ->latest('created_at')
                ->take(8)
                ->get();    
        $conventionAndTradeModels =  User::where('is_subscribe',1)
                ->where('membership_id',1)
                ->where('convention_and_trade',1)
                ->where('status',1)
                ->latest('created_at')
                ->take(4)
                ->get();            
        return view('index',compact('banners','settings','advertisements','poll','newestFaces','childModels','photographers','featureModels','conventionAndTradeModels','fixed_advertisements'));
    }
    public function aboutUs(){
        return view('about_us');
    }

    public function storeNewsletter(Request $request){
        //dd($request->all());
        try{
                $this->validate($request,[
                        'email'          => 'required',
                ]);

                NewsLetter::create([ 'email' => $request->email]);
                $data = 'seccess';
                return response()->json($data);
        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

}
