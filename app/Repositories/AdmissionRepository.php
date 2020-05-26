<?php

namespace App\Repositories;

use App\Models\Admission;
use App\Repositories\BaseRepository;

/**
 * Class AdmissionRepository
 * @package App\Repositories
 * @version March 31, 2020, 6:46 am UTC
*/

class AdmissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'address',
        'gender',
        'telephone',
        'email',
        'image',
        'dob',
        'user_id',
        'class_id',
        'status',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        'date_registered'
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
        return Admission::class;
    }
}
