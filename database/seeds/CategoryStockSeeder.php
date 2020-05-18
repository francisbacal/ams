<?php

use Illuminate\Database\Seeder;

class CategoryStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_stocks')->insert([
            [
                'available' => 50,
                'total' => 50,
                'category_id' => 1,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 2,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 3,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 4,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 5,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 6,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 7,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 8,
            ],
            [
                'available' => 0,
                'total' => 0,
                'category_id' => 9,
            ],

        ]);
    }
}
