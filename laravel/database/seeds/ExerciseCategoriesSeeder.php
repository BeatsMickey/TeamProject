<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_exercises')->insert($this->getData());
    }

    private function getData() {
        $data = [['name' => 'Категория 1'],
            ['name' => 'Категория 2'],
            ['name' => 'Категория 3'],
        ];

        return $data;
    }
}
