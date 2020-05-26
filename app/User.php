<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {


        return $this->belongTo('App\Models\Role');
    }
    public static $rules = [
        'name' => 'required',
     'email'=>'required',
     'password'=>'required',
    ];

    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher');
    } 

    public function admission()
    {
        return $this->hasOne('App\Models\Admission');
    } 


            public function verifyUser()
        {
        return $this->hasOne('App\VerifyUser');
        }
}
