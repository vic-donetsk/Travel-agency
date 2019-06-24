<?php

use Faker\Generator as Faker;
use App\Models\Country;

$factory->define(App\Models\City::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'country_id' => $faker->numberBetween(1, Country::count())
    ];
});
