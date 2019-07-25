<?php

//use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tour;

$factory->define(Comment::class, function () {

	$faker = Faker\Factory::create('ru_RU');

    return [
        'author_name' => $faker->name,
        'author_email' => $faker->unique()->safeEmail,
        'tour_id' => Tour::inRandomOrder()->first()->id,
        'content' => $faker->text($maxNbChars = 300)  
    ];
});
