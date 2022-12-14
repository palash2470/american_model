<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function userPlan(){
        return $this->hasOne(UserPlan::class,'id','user_plan_id');
    }
}
