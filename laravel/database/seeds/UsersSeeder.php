<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData() {
        $data = [['name' => 'user', 'email' => 'user@mail.com', 'password' => '$2y$10$0V3nzoUvrk.TZPwDUosiKu9P8jqR5Vb4gE9I3wRjvrNqJvXYuMCTS', 'is_admin' => '0'],
            ['name' => 'admin', 'email' => 'admin@mail.com', 'password' => '$2y$10$0V3nzoUvrk.TZPwDUosiKu9P8jqR5Vb4gE9I3wRjvrNqJvXYuMCTS', 'is_admin' => '1'],
        ];
        return $data;
    }
}
