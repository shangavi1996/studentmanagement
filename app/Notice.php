<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notice';

    protected $fillable = [
        'to','notice','mark_as_read'
    ];

    protected $casts = [
        'mark_as_read' => 'array'
    ];

   
}
