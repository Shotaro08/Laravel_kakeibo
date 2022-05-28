<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main')->insert([
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム',
            'payment_method_id' => 2,
        ]);
    }
}
