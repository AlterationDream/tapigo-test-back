<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Тестовый пользователь',
                'email' => 'test@test.test',
                'password' => bcrypt('testtest'),
            ],
            [
                'name' => 'Тестовый пользователь',
                'email' => 'test2@test.test',
                'password' => bcrypt('testtest'),
            ],
            [
                'name' => 'Тестовый пользователь',
                'email' => 'test3@test.test',
                'password' => bcrypt('testtest'),
            ],
        ]);
    }
}
