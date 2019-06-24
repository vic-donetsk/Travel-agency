<?php

use App\Models\Tour;
use App\Models\Media;
use App\Models\Country;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Category;
use App\Models\Type;
//use App\Models\Nutrition;
use App\Models\User;


use Carbon\Carbon;


use Faker\Generator as Faker;

$factory->define(Tour::class, function (Faker $faker) {


	// считаем количество дней до тура, начало, продолжительность и конец
	// $current_timestamp = Carbon::now()->timestamp; 
 //    $days_before_start = rand(1, 30);
 //      $start_time = $current_timestamp + 86400 * $days_before_start;
 //    $tour_duration = rand(2, 15);
 //      $finish_time = $start_time + 86400 * $tour_duration;
 //      dd($finish_time)

    $current_date = Carbon::now(); 
    $days_before_start = rand(1, 30);
      $start_day = $current_date->addDays($days_before_start);
    $tour_duration = rand(2, 15);
      $finish_day = $start_day->addDays($tour_duration);

    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        'price' => rand(100, 20000),
        'started_at' => $start_day,
        'finished_at' => $finish_day,
        'for_children' => $faker->boolean($chanceOfGettingTrue = 70),
        'main_img_id' => rand(1, Media::count()),
        'country_id' => rand(1, Country::count()),
        'start_location_id' => rand(1, Location::count()),
        'hotel_id' => rand(1, Hotel::count()),
        'category_id' => rand(1, Category::count()),
        'type_id' => rand(1, Type::count()),
        'nutrition_id' => 1, // rand(1, Nutrition::count()), - исправить потом
        'seller_id' => rand(1, User::count()),
    ];
});
