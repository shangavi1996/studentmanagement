<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 * @package App\Models
 * @version March 31, 2020, 5:48 am UTC
 *
 * @property string course_name
 * @property string course_code
 * @property string course_description
 * @property boolean status
 */
class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_name',
        'course_code',
        'course_description',
        'status',
        'level',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'course_id' => 'integer',
        'course_name' => 'string',
        'course_code' => 'string',
        'course_description' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_name' => 'required',
        'course_code' => 'required',
        'course_description' => 'required',
        'status' => 'required',
        'level' => 'required',
    ];


    public function teacher()
    {
    	return $this->blongsTo('App\Models\Teacher');
    }

    public function studymaterials()
    {
    	return $this->hasMany('App\StudyMaterial');
    }


    
}
