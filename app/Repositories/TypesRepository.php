<?php

namespace App\Repositories;

use App\Models\Types;
use InfyOm\Generator\Common\BaseRepository;

class TypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Types::class;
    }
}
