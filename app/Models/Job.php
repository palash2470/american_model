<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getJobLocations ()
    {
        return $this->hasMany(JobLocation::class, 'jobId', 'id');
    }

    public function getJobCategory ()
    {
        return $this->hasOne(Category::class, 'id', 'jobCategory');
    }

    public function getJobApplyByUser ()
    {
        return $this->hasOne(JobsApply::class, 'jobId', 'id')->where('userId', auth()->user()->id);
    }

    public function getJobApplied ()
    {
        return $this->hasMany(JobsApply::class, 'jobId', 'id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','createdBy');
    }
    public function images(){
        return $this->hasMany(JobImage::class,'job_id','id');
    }
}
