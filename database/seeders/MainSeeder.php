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
        DB::table('main')->insert([[
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム1',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム2',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム3',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム4',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム5',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム6',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム7',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム8',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム9',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム10',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム11',
            'payment_method_id' => 2,
        ],
        [
            'user_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'category1_id' => 1,
            'category2_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム12',
            'payment_method_id' => 2,
        ]]);
    }
}
