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
            ["name" => "Laptop"],
            ["name" => "Monitor"],
            ["name" => "CPU"],
            ["name" => "Mouse"],
            ["name" => "Keyboard"],
            ["name" => "UPS"],
            ["name" => "Software"],
            ["name" => "Consumables"],
            ["name" => "Other Accessories"],
        ];

        DB::table('categories')->insert($categories);
    }
}
