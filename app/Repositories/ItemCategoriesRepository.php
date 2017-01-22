<?php

namespace App\Repositories;

use App\Models\ItemCategories;
use InfyOm\Generator\Common\BaseRepository;

class ItemCategoriesRepository extends BaseRepository
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
        return ItemCategories::class;
    }
}
