<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Measurements extends Model
{
    protected $fillable = [
        'weight',
        'shoulders',
        'biceps',
        'forearms',
        'chest',
        'waist',
        'thigh',
        'calf',
        'user_id'
    ];
}
