<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    protected $fillable = [
        'name',
    ];

    public static function getAll() {
        return Sets::query()->get();
    }
}
