<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Repositories\BaseRepository;

/**
 * Class ClassRepository
 * @package App\Repositories
 * @version March 31, 2020, 5:29 am UTC
*/

class ClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_name',
        'class_code'
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
        return Classes::class;
    }
}
