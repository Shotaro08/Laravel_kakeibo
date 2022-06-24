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
                'id' => 1,
                'name' => '現金',
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'name' => 'クレジットカード',
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'name' => 'PayPay',
                'sort_order' => 3,
            ],
        ]);
    }
}
