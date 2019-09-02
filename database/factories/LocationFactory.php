<?php

use Faker\Generator as Faker;
use App\Models\City;
use App\Models\Location;


$factory->define(Location::class, function (Faker $faker) {
 
	$departure = ['Выезд','Вылет','Отплытие', 'Отправление'];
	$departurePlace = ['с вокзала', 'из аэропорта', 'с причала', 'из'];

    return [
        'name' => $faker->randomElement($departurePlace),
        'city_id' => City::inRandomOrder()->first()->id,
        'variant' => $faker->randomElement($departure)

    ];
});
