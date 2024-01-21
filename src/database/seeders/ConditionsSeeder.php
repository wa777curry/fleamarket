<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert([
            'condition' => 'Ｓ・新品',
        ]);

        DB::table('conditions')->insert([
            'condition' => 'Ａ・ほぼ新品',
        ]);

        DB::table('conditions')->insert([
            'condition' => 'Ｂ・良い',
        ]);

        DB::table('conditions')->insert([
            'condition' => 'Ｃ・可',
        ]);

        DB::table('conditions')->insert([
            'condition' => 'Ｄ・悪い',
        ]);

        DB::table('conditions')->insert([
            'condition' => 'Ｅ・難あり',
        ]);
    }
}
