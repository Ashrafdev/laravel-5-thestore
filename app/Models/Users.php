<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Users
 * @package App\Models
 * @version January 22, 2017, 4:33 pm UTC
 */
class Users extends Model
{
    use SoftDeletes;

    public $table = 'users';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'dob',
        'gender',
        'mobile',
        'email',
        'password',
        'role_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'dob' => 'date',
        'gender' => 'string',
        'mobile' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'role_id' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
