<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'job_id' => App\Job::all()->random()->id,
        'client_id' => App\Client::all()->random()->id,
        'project_title' => $faker->sentence(3, true),
        'description' => $faker->sentence,
        'project_cost' => $faker->numberBetween(100, 1000),
        'duration' => $faker->numberBetween(10, 50),
    ];
});
