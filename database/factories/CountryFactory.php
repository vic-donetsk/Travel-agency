<?php

$factory->define(App\Models\Country::class, function () {

 	$faker = Faker\Factory::create('ru_RU');

    return [
        'name' => $faker->unique()->country
    ];
});
