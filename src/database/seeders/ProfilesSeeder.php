<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 2,
            'username' => '靴出品者ユーザー',
            'postcode' => '5408570',
            'address' => '大阪市中央区大手前2丁目',
            'building' => null,
            'icon_url' => '/storage/icon/seller.jpg',
        ]);
    }
}
