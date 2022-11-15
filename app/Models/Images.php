<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = ['title','user_id','image','category','description'];

    public function comments(){
        return $this->hasMany(PhotoComment::class,'photo_id','id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function likes(){
        return $this->hasMany(PhotoLike::class,'photo_id','id');
    }

    public function checkUserLike(){
        return $this->hasOne(PhotoLike::class,'photo_id','id')->where('user_id', auth()->user()->id);
    }
}
