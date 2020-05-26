<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    protected $table = 'studymaterials';

    protected $fillable = [
        'level','filename','subject','teacher_id'
    ];

    public function course()
    {
    	return $this->blongsTo('App\Models\Course','id');
    }

}
