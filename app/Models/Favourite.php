<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favour_by',
    ];

    public function favouriteUser(){
        return $this->hasOne(User::class,'id','favour_by');
    }
}
