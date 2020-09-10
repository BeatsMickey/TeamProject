<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseCategoriesRelationsSeeder extends Seeder
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
        $data = [
            ['exercises_id' => '2', 'categories_id' => 1],
            ['exercises_id' => '1', 'categories_id' => 1],
            ['exercises_id' => '3', 'categories_id' => 1],
            ['exercises_id' => '4', 'categories_id' => 2],
            ['exercises_id' => '5', 'categories_id' => 2],
            ['exercises_id' => '6', 'categories_id' => 2],
            ['exercises_id' => '7', 'categories_id' => 3],
            ['exercises_id' => '7', 'categories_id' => 1],
            ['exercises_id' => '8', 'categories_id' => 3],
            ['exercises_id' => '9', 'categories_id' => 3],
            ['exercises_id' => '9', 'categories_id' => 2],
        ];

        return $data;
    }
}
