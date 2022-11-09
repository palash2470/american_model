<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function fromUser(){
        return $this->hasOne(User::class,'id','comment_from_user_id');
    }
    public function toUser(){
        return $this->hasOne(User::class,'id','comment_to_user_id');
    }

    public function replies()
    {
        return $this->hasMany(ProfileComment::class, 'parent_comment_id');
    }

    public function getCommentLikeByUser()
    {
        return $this->hasOne(ProfileCommentLike::class,'commentId', 'id')->where('userId', auth()->user()->id);
    }
}
