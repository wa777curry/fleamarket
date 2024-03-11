<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'admin_id' => 1,
            'email' => 'user@testmail',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'admin_id' => 1,
            'email' => 'seller@testmail',
            'password' => Hash::make('password'),
        ]);

        User::factory()->count(5)->create();
    }
}
