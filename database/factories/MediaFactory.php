<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {
    return [
        'path' => $faker->image('storage/app/public', 640, 480)
    ];
});
