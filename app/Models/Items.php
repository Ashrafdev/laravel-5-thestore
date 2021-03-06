<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Items
 * @package App\Models
 * @version January 22, 2017, 4:32 pm UTC
 */
class Items extends Model
{
    use SoftDeletes;

    public $table = 'items';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $hidden = ['user_id', 'file_mime', 'updated_at', 'deleted_at'];

    public $fillable = [
        'name',
        'description',
        'price',
        'img_path',
        'file_mime',
        'item_categories_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'img_path' => 'string',
        'file_mime' => 'string',
        'item_categories_id' => 'integer',
        'user_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }
}
