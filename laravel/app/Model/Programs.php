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
}
