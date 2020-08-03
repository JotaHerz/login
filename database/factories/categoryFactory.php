<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(category::class, function (Faker $faker) {
    return [
        'name'=> $title=$faker->title,
        'url'=> Str::slug($title),

    ];
});
