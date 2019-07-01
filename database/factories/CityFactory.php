<?php

use App\Models\Country;

$factory->define(App\Models\City::class, function () {

	$faker = Faker\Factory::create('ru_RU');

    return [
        'name' => $faker->unique()->city,
        'country_id' => Country::inRandomOrder()->first()->id
    ];
});
