<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert($this->getData());
    }

    private function getData() {
        $data = [['name' => 'Программа морпеха'],
            ['name' => 'Программа баллерины'],
            ['name' => 'Программа детская'],
        ];

        return $data;
    }
}
