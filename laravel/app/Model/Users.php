<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

}
