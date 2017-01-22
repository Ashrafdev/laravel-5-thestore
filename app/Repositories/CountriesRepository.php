<?php

namespace App\Repositories;

use App\Models\Countries;
use InfyOm\Generator\Common\BaseRepository;

class CountriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Countries::class;
    }
}
