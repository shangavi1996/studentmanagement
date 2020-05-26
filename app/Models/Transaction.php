<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version March 31, 2020, 6:11 am UTC
 *
 * @property integer student_id
 * @property integer fee_id
 * @property integer use_id
 * @property integer paid
 * @property string remark
 * @property string description
 * @property string trabsaction_date
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'fee_id',
        'use_id',
        'paid',
        'remark',
        'description',
        'trabsaction_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'transaction_id' => 'integer',
        'student_id' => 'integer',
        'fee_id' => 'integer',
        'use_id' => 'integer',
        'paid' => 'integer',
        'remark' => 'string',
        'description' => 'string',
        'trabsaction_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required',
        'fee_id' => 'required',
        'use_id' => 'required',
        'paid' => 'required',
        'remark' => 'required',
        'description' => 'required',
        'trabsaction_date' => 'required'
    ];

    
}
