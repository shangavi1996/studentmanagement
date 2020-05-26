<?php

namespace App\Repositories;

use App\Models\Classroom;
use App\Repositories\BaseRepository;

/**
 * Class ClassroomRepository
 * @package App\Repositories
 * @version March 31, 2020, 5:40 am UTC
*/

class ClassroomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'status',
        'classroom_code',
        'name'
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
        return Classroom::class;
    }
}
