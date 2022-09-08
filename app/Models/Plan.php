<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plans';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function plangroup(){
        return $this->hasOne(PlanGroup::class,'id','plan_group_id');
    }

    public function planDetails(){
        return $this->hasMany(PlanDetails::class,'plan_id','id');
    }

    public function planDetailsOne(){
        return $this->hasOne(PlanDetails::class,'plan_id','id');
    }
}
