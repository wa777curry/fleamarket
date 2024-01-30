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
            'user_id' => 1,
            'payment' => 'クレジットカード払い',
        ]);

        DB::table('payments')->insert([
            'user_id' => 1,
            'payment' => 'コンビニ払い',
        ]);

        DB::table('payments')->insert([
            'user_id' => 1,
            'payment' => '銀行振込',
        ]);
    }
}
