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

    //public function 
}
