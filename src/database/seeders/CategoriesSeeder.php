<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => '服',
        ]);

        DB::table('categories')->insert([
            'category' => '靴',
        ]);

        DB::table('categories')->insert([
            'category' => 'バッグ・財布',
        ]);

        DB::table('categories')->insert([
            'category' => 'アクセサリー',
        ]);

        DB::table('categories')->insert([
            'category' => '時計',
        ]);
    }
}
