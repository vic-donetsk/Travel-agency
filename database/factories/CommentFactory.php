<?php

use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tour;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'tour_id' => Tour::inRandomOrder()->first()->id,
        'content' => $faker->text($maxNbChars = 300)  
    ];
});
