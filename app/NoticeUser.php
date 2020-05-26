<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeUser extends Model
{
    protected $table = 'notice_user';

    protected $fillable = [
        'read_by','notice_id',
    ];

}
