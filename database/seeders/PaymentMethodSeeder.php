<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => '現金',
                'sort_order' => 1,
            ],
            [
                'name' => 'クレジットカード',
                'sort_order' => 2,
            ],
            [
                'name' => 'PayPay',
                'sort_order' => 3,
            ],
        ]);
    }
}
