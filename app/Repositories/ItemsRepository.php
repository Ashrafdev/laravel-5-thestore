<?php

namespace App\Repositories;

use App\Models\Items;
use InfyOm\Generator\Common\BaseRepository;

class ItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'price',
        'img_path',
        'file_mime',
        'item_categories_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Items::class;
    }
}
