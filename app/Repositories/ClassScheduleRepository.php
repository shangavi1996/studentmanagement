<?php

namespace App\Repositories;

use App\Models\ClassSchedule;
use App\Repositories\BaseRepository;

/**
 * Class ClassScheduleRepository
 * @package App\Repositories
 * @version March 31, 2020, 5:56 am UTC
*/

class ClassScheduleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClassSchedule::class;
    }
}
