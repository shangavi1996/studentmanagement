<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Level
 * @package App\Models
 * @version March 31, 2020, 5:44 am UTC
 *
 * @property string level_name
 * @property boolean status
 * @property integer course_id
 * @property string level_description
 */
class Level extends Model
{
    use SoftDeletes;

    public $table = 'levels';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'level_name',
        'status',
        'course_id',
        'level_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'level_id' => 'integer',
        'level_name' => 'string',
        'status' => 'boolean',
        'course_id' => 'integer',
        'level_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'level_name' => 'required',
        'status' => 'required',
        'course_id' => 'required',
        'level_description' => 'required'
    ];

    
}
