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

        factory(App\User::class, 'A4-paper', 100)->create();
        factory(App\User::class, 'mouse', 50)->create();
    }
}
