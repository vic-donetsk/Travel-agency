<?php

use App\Models\Tour;
use App\Models\Media;
use App\Models\Country;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Category;
use App\Models\Type;
use App\Models\Diet;
use App\Models\User;

use Faker\Generator as Faker;

$factory->define(Tour::class, function (Faker $faker) {

    $start_day = $faker->dateTimeBetween('now', '30 days');
    $finish_day = $faker->dateTimeBetween($start_day, '50 days');

    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        'price' => rand(100, 2000),
        'started_at' => $start_day,
        'finished_at' => $finish_day,
        'for_children' => $faker->boolean($chanceOfGettingTrue = 70),
        'main_img_id' => Media::inRandomOrder()->first()->id,
        'country_id' => Country::inRandomOrder()->first()->id,
        'start_location_id' => Location::inRandomOrder()->first()->id,
        'hotel_id' => Hotel::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'type_id' => Type::inRandomOrder()->first()->id,
        'diet_id' => Diet::inRandomOrder()->first()->id, 
        'seller_id' => User::inRandomOrder()->first()->id,
    ];
});
