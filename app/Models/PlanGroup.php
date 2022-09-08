<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanGroup extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plan_groups';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getPlanAttrArrAttribute()
    {
        return explode(',', $this->plan_attributes);
    }

    public function getPlanTypeListAttribute()
    {
        return explode(',', $this->plan_types);
    }

    public function plans(){
        return $this->hasMany(Plan::class,'plan_group_id','id');
    }

    public function getPlanAttrNameAttribute(){
       return PlanAttribute::whereIn('id',$this->plan_attr_arr)->get();
    }

}
