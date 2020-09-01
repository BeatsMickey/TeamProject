<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert($this->getData());
    }

    private function getData() {
        $data = [['user_id' => '1'],
            ['user_id' => '2'],
        ];
        return $data;
    }

}
