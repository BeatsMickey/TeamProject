<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $fillable = [
        'name',
    ];

    public static function getAll() {
        return Programs::query()->get();
    }
}
