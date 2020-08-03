<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
     * Define a class with a given set of attributes.
     *
     * @param  string  $class
     * @param  callable  $attributes
     * @return $this
     */
$factory->define(Product::class, function (Faker $faker)
{
    return [
        'title'=>$title=$faker->sentence,
        'url'=>Str::slug($title),
        'description'=>$faker->paragraph,
        'cost'=>'3450',
        'category_id' => $faker->numberBetween(1,3),
    ];
});
