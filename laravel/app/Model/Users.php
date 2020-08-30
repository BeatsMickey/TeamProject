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

    public static function getAllUsers(int $numberPerPage) {
        return Users::query()->paginate($numberPerPage);
    }

}
