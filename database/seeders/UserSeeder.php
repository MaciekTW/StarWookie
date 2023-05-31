<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::createWithCollection([
            'username' => 'Janek',
            'favCharacter' => 'Yoda',
            'email' => 'janek@gmail.com',
            'password' => 'TajneHaslo_123',
        ]);

        User::createWithCollection([
            'username' => 'Maciek',
            'favCharacter' => 'Yoda',
            'email' => 'maciek@gmail.com',
            'password' => 'TajneHaslo_123',
        ]);
    }
}
