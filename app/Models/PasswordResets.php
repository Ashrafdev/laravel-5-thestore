<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    public $table = 'password_resets';
    public $primaryKey = 'id';
    public $incrementing = true;
    protected $dates = ['created_at'];
    protected $updated_at = false;

    public $fillable = [
        'email',
        'token',
    ];

    public $hidden = ['id'];
}
