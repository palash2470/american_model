<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    use HasFactory,SoftDeletes;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_details';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getCategory(){
        return $this->hasOne(Category::class,'id','membership_type_id');
    }
    
    public function getHeight(){
        return $this->hasOne(Size::class,'id','height');
    }
    public function getChest(){
        return $this->hasOne(Size::class,'id','chest');
    }
    public function getWaist(){
        return $this->hasOne(Size::class,'id','waist');
    }
    public function getHips(){
        return $this->hasOne(Size::class,'id','hip');
    }
    public function getEyeColor(){
        return $this->hasOne(Colour::class,'id','eye_color');
    }
    public function getCountry(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function getState(){
        return $this->hasOne(State::class,'id','state_id');
    }
    public function getCity(){
        return $this->hasOne(City::class,'id','city_id');
    }

    public function getEthnicity(){
        return $this->hasOne(Ethnicity::class,'id','ethnicity');
    }

    public function getUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
