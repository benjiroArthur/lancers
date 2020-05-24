<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Freelancer;
use Faker\Generator as Faker;

$factory->define(Freelancer::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});

