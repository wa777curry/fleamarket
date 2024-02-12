<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'subcategory' => '靴',
        ]);

        DB::table('subcategories')->insert([
            'subcategory' => '鞄',
        ]);

        DB::table('subcategories')->insert([
            'subcategory' => '時計',
        ]);
    }
}
