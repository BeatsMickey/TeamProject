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
        $data = [['name' => 'Грудь'],
            ['name' => 'Ноги'],
            ['name' => 'Спина'],
        ];

        return $data;
    }
}
