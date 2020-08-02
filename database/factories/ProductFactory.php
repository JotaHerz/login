<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title'=>$title=$faker->sentence,
        'url'=>Str::slug($title),
        'description'=>$faker->paragraph,
        'cost'=>'3450',
    ];
});
