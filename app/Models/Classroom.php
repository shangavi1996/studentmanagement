<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Classroom
 * @package App\Models
 * @version March 31, 2020, 5:40 am UTC
 *
 * @property string description
 * @property boolean status
 * @property string classroom_code
 * @property string name
 */
class Classroom extends Model
{
    use SoftDeletes;

    public $table = 'classrooms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'status',
        'classroom_code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'classroom_id' => 'integer',
        'description' => 'string',
        'status' => 'boolean',
        'classroom_code' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'status' => 'required',
        'classroom_code' => 'required',
        'name' => 'required'
    ];

    
}
