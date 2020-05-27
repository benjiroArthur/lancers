<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobOffered;
use Faker\Generator as Faker;

$factory->define(\App\JobOffered::class, function (Faker $faker) {
    return [
        'project_id' => $faker->unique()->randomElement(App\Project::pluck('id', 'id')->toArray()),
        'freelancer_id' => App\ProjctApplication::all()->random()->freelancer_id,
    ];
});

