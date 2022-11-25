<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ethnicity extends Model
{
    use HasFactory;
    use SoftDeletes;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ethnicites';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
