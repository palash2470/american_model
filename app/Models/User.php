<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'email_verify_token',
        'model_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetails(){
        return $this->hasOne(UserDetails::class,'user_id','id');
    }

    public function userPlan(){
        return $this->hasOne(UserPlan::class,'user_id','id')->where('status',1);
    }
    
    public function category(){
        return $this->hasOne(Category::class,'id','membership_id');
    }

    public function images(){
        return $this->hasMany(Images::class,'user_id','id');
    }

    public function viewes(){
        return $this->hasMany(ProfileView::class,'user_id','id');
    }

    public function favourites(){
        return $this->hasMany(Favourite::class,'user_id','id');
    }

    public function followers(){
        return $this->hasMany(Follow::class,'follower_id','id');
    }
    public function followings(){
        return $this->hasMany(Follow::class,'following_id','id');
    }
}
