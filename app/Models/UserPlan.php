<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_plans';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function plan(){
        return $this->hasOne(Plan::class,'id','plan_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function planGroup(){
        return $this->hasOne(PlanGroup::class,'id','plan_group_id');
    }

    public function userPremiumMemberPlanDetails() {
        return $this->hasOne(UserPlanDetails::class,'user_plan_id','id')->where('attribute_slug','premium-member-placement');
    }
}
