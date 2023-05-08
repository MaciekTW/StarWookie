<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Janek',
            'email' => 'janek@gmail.com',
            'password' => bcrypt('TajneHaslo_123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Maciek',
            'email' => 'maciek@gmail.com',
            'password' => bcrypt('TajneHaslo_123'),
        ]);
    }
}
