<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Place::class, function (Faker\Generator $faker)
{
    return [
        'name'             => $faker->unique()->sentence,
        'address'          => $faker->address,
        'description'      => $faker->paragraphs($nb = 3, $asText = false),
        'coordinate-x'     =>$faker->longitude($min = 107.5, $max = 107.75),
        'coordinate-y'     =>$faker->latitude($min = -7, $max = -6.8),
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker)
{
    return [
        'place_id' => $faker->numberBetween($min = 1, $max = 100),
        'url'     => $faker->imageUrl(600, 800),
    ];
});
