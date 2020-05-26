<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admission
 * @package App\Models
 * @version March 31, 2020, 6:46 am UTC
 *
 * @property string firstname
 * @property string lastname
 * @property string address
 * @property string gender
 * @property string telephone
 * @property string email
 * @property string image
 * @property string dob
 * @property integer user_id
 * @property integer class_id
 * @property boolean status
 * @property string date_registered
 */
class Admission extends Model
{
    use SoftDeletes;

    public $table = 'admissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'address',
        'gender',
        'telephone',
        'email',
        'image',
        'dob',
        'status',
        'date_registered'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'gender' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'image' => 'string',
        'dob' => 'date',
        'user_id' => 'integer',
        'class_id' => 'integer',
        'status' => 'boolean',
        'date_registered' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'telephone' => 'required',
        'email' => 'required| unique:users,id',
        'dob' => 'required',
        'status' => 'required',
        'date_registered' => 'required'
    ];

    public static $rules_1 = [
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'telephone' => 'required',
        'password'=>'required',
        'email' => 'required | unique:users,email',
        'dob' => 'required',
        'status' => 'required',
        'date_registered' => 'required'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
