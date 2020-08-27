<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sets')->insert($this->getData());
    }

    private function getData() {
        $data = [['name' => 'Набор 1'],
            ['name' => 'Набор 2'],
            ['name' => 'Набор 3'],
        ];

        return $data;
    }


}
