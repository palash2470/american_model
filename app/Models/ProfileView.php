<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'viewer_id',
    ];

    public function viewerUser(){
        return $this->hasOne(User::class,'id','viewer_id');
    }
}
