<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClassSchedule
 * @package App\Models
 * @version March 31, 2020, 5:56 am UTC
 *
 * @property integer course_id
 * @property integer level_id
 * @property integer shift_id
 * @property integer classroom_id
 * @property integer batch_id
 * @property integer day_id
 * @property integer time_id
 * @property integer term_id
 * @property time starttime
 * @property time endtime
 * @property boolean status
 */
class ClassSchedule extends Model
{
    use SoftDeletes;

    public $table = 'class_schedulings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_id',
        'level_id',
        'shift_id',
        'classroom_id',
        'batch_id',
        'day_id',
        'time_id',
        'term_id',
        'starttime',
        'endtime',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'class_scheduling_id' => 'integer',
        'course_id' => 'integer',
        'level_id' => 'integer',
        'shift_id' => 'integer',
        'classroom_id' => 'integer',
        'batch_id' => 'integer',
        'day_id' => 'integer',
        'time_id' => 'integer',
        'term_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'level_id' => 'required',
        'shift_id' => 'required',
        'classroom_id' => 'required',
        'batch_id' => 'required',
        'day_id' => 'required',
        'time_id' => 'required',
        'term_id' => 'required',
        'starttime' => 'required',
        'endtime' => 'required',
        'status' => 'required'
    ];

    
}
