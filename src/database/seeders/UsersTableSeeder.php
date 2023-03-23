<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                [
                    'name' => '田上黎',
                    'email' => 'rei@email.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => '小野かんた',
                    'email' => 'onokan@email.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'ぽんた',
                    'email' => 'ponta@email.com',
                    'password' => bcrypt('password'),
                ],

            ]
        );
    }
}
