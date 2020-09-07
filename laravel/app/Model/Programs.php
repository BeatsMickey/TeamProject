<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
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
        return Programs::query()->get();
    }

    public static function getOne($id) {

        return Programs::query()
            ->join('relations_set-program',
                'programs.id',
                '=',
                'relations_set-program.program_id')
            ->get();
    }

    public function sets()
    {
        return $this->belongsToMany('App\Model\Sets')->withPivot('day_of_program');
    }

    public function users() {
        return $this->hasMany('App\Model\Users');
    }
}
