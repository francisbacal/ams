<?php

use App\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asset::truncate();
        factory(Asset::class, 50)->create();

        factory(Asset::class, 100)->states('A4-paper')->create();
        factory(Asset::class, 50)->states('mouse')->create();
    }
}
