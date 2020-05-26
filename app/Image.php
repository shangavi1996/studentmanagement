<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'filename','user_id','teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    } 
}
