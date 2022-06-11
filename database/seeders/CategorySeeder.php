<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '固定費',
                'sort_order' => 1,
            ],
            [
                'name' => '食費',
                'sort_order' => 2,
            ],
            [
                'name' => '交通費',
                'sort_order' => 3,
            ],
            [
                'name' => '娯楽費',
                'sort_order' => 4,
            ],
        ]);

        // DB::table('secondary_categories')->insert([
        //     [
        //         'name' => '家賃',
        //         'sort_order' => 1,
        //         'primary_category_id' => 1,
        //     ],
        //     [
        //         'name' => 'パルシステム',
        //         'sort_order' => 2,
        //         'primary_category_id' => 2,
        //     ],
        //     [
        //         'name' => '電車',
        //         'sort_order' => 3,
        //         'primary_category_id' => 3,
        //     ],
        //     [
        //         'name' => 'サウナ',
        //         'sort_order' => 4,
        //         'primary_category_id' => 4,
        //     ],
        // ]);
    }
}
