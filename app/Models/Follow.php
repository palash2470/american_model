<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    public function followersUser(){
        return $this->hasOne(User::class,'id','follower_id');
    }
    public function followingsUser(){
        return $this->hasOne(User::class,'id','following_id');
    }
}
