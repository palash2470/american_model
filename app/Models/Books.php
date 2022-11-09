<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }

    public function bookingUser(){
        return $this->hasOne(User::class,'id','booked_user_id');
    }
}
