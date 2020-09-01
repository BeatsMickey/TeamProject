<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'age',
        'gender',
        'user_id'
    ];

    public static function getAllDetailsByUserId(int $id) {
        return UserDetails::query()->where('user_id', '=', $id)->get()['0'];
    }
}
