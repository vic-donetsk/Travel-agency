<?php

use Faker\Generator as Faker;
use App\Models\City;
use App\Models\Location;


$factory->define(Location::class, function (Faker $faker) {
 
	$departure = ['выезд','вылет','отплытие'];
	$departure_place = ['вокзал', 'аэропорт', 'причал', ''];

    return [
        'name' => $faker->randomElement($departure_place),
        'city_id' => City::inRandomOrder()->first()->id,
        'variant' => $faker->randomElement($departure)

    ];
});
