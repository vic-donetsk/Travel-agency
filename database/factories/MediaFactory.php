<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {
    return [
        'path' => $faker->image('public/storage', 640, 480)
    ];
});
