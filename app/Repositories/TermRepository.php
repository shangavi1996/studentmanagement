<?php

namespace App\Repositories;

use App\Models\Term;
use App\Repositories\BaseRepository;

/**
 * Class TermRepository
 * @package App\Repositories
 * @version April 3, 2020, 8:18 am UTC
*/

class TermRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'term_name'
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
        return Term::class;
    }
}
