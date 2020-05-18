<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Asset;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Asset::class, function (Faker $faker) {
    $serial = $faker->bothify('#??###?#?');
    $date = Carbon::now()->format('Ymd');
    $code = "AMS-" . $serial . "-" . $date;
    $array = [1, 3, 4, 5];
    $rand_status = Arr::random($array);
    

    return [
        'name' => 'Macbook Pro 13"',
        'code' => $code,
        'serial' => $serial,
        'price' => $faker->randomFloat(2, '74990', '99999'),
        'description' => "1.4GHz Quad-Core Processor with Turbo Boost up to 3.9GHz
        256 GB Storage
        Touch Bar and Touch ID",
        'image' => 'http://ams-management.herokuapp.com/dist/img/assets/mbpmbp13.jpg',
        'category_id' => 1,
        'asset_status_id' => $rand_status,
    ];
});

//LAPTOP

$factory->state(App\Models\AssetModel::class, 'mbp-13', function ($faker) {

});
