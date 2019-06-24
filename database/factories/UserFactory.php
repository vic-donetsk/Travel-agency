<?php

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->regexify('\+380\d{2}-\d{3}-\d{2}-\d{2}'), 
        'email' => $faker->unique()->safeEmail,
        'avatar' => $faker->imageUrl(),
        'password' => Hash::make($faker->word),
        //'email_verified_at' => now(),
        //'remember_token' => Str::random(10),
    ];
});
