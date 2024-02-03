<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ConditionsSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
