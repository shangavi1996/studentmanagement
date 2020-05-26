<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teacher
 * @package App\Models
 * @version May 3, 2020, 12:13 pm UTC
 *
 */
class Teacher extends Model
{
    use SoftDeletes;

    public $table = 'teachers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname','lastname','address','gender','telephone','dob','grade','img_filename','email','user_id','status','date_registered'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
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
        'password'=>'required',
        'email' => 'required| unique:users,email',
        'dob' => 'required',
        'status' => 'required',
        'date_registered' => 'required',
        'grade' => 'required',
        
    ];


    public static $rules_1 = [
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'telephone' => 'required',
        'email' => 'required | unique:users,id',
        'dob' => 'required',
        'status' => 'required',
        'date_registered' => 'required',
        'grade' => 'required',
    ];

    
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function studymaterials()
    {
    	return $this->hasMany('App\StudyMaterial');
    }

    
}
