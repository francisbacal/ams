<?php

use Illuminate\Database\Seeder;

class AssetStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asset_statuses = [
            [
                "name" => "Available",
            ],
            [
                "name" => "Deployed",
            ],
            [
                "name" => "For Diagnosis",
            ],
            [
                "name" => "For Repair",
            ],
        ];

        DB::table('asset_statuses')->insert($asset_statuses);
    }
}
