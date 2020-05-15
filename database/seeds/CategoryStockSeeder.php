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
        ]);
    }
}
