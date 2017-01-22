<?php

namespace App\Repositories;

use App\Models\States;
use InfyOm\Generator\Common\BaseRepository;

class StatesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return States::class;
    }
}
