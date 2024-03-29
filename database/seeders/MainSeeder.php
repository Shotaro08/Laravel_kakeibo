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
        [
            'users_id' => 1,
            'year' => 2022,
            'month' => 5,
            'date' => 28,
            'primary_categories_id' => 1,
            'amount' => 5000,
            'description' => 'パルシステム1',
            'payment_methods_id' => 2,
        ]]);
    }
}
