<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function photo(){
        return $this->hasOne(Images::class,'id','photo_id');
    }
}
