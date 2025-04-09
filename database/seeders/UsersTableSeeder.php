<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => '佐藤',
            'email' => 'sato0123@email.com',
            'password' => bcrypt('sato0000pw')],
            ['username' => '鈴木',
            'email' => 'suzuki0123@email.com',
            'password' => bcrypt('suzuki0000pw')],
            ['username' => '田中',
            'email' => 'tanaka0123@email.com',
            'password' => bcrypt('tanaka0000pw')],
            ['username' => '高橋',
            'email' => 'takahashi0123@email.com',
            'password' => bcrypt('takahashi0000pw')],
            ['username' => '山田',
            'email' => 'yamada0123@email.com',
            'password' => bcrypt('yamada0000pw')]
        ]);
    }
}
