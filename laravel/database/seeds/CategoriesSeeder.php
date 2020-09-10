<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {
        $data = [['name' => 'Грудь'],
            ['name' => 'Ноги'],
            ['name' => 'Спина'],
        ];

        return $data;
    }
}
