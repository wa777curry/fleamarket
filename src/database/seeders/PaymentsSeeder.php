<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'payment' => 'クレジットカード払い',
        ]);

        DB::table('payments')->insert([
            'payment' => 'コンビニ払い',
        ]);

        DB::table('payments')->insert([
            'payment' => '銀行振込',
        ]);
    }
}
