<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

}
