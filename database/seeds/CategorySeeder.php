<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "Electronics",
                "parent_id" => null,
            ],
            [
                "name" => "Hardware",
                "parent_id" => 1,
            ],
            [
                "name" => "Software",
                "parent_id" => 1,
            ],
            [
                "name" => "Office Supplies",
                "parent_id" => null,
            ],
            [
                "name" => "Pens & Markers",
                "parent_id" => 4,
            ],
            [
                "name" => "Pens & Markers",
                "parent_id" => 4,
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
