<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    use HasFactory;
    
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'image_categories';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function images(){
        return $this->hasMany(Images::class,'category','id');
    }
}
