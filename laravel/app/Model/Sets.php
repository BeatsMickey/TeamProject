<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    protected $fillable = [
        'name',
        'created_by'
    ];

    public static function rules() {
        return [
            'name' => ['required', 'min:3', 'max:100'],
        ];
    }

    public static function getAll() {
        return Sets::query()->get();
    }

    public function programs()
    {
        return $this->belongsToMany('App\Model\Programs');
    }

    public function exercises()
    {
        return $this->belongsToMany('App\Model\Exercises');
    }

}
