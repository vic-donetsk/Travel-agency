<?php

use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tour;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, User::count()),
        'tour_id' => rand(1, Tour::count()),
        'content' => $faker->text($maxNbChars = 300)  
    ];
});
