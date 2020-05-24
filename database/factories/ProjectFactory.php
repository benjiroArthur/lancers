<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'job_id' => factory(\App\Job::class)->create(),
        'client_id' => factory(\App\Client::class)->create(),
        'description' => $faker->sentence,
        'project_cost' => $faker->numberBetween(100, 1000),
        'duration' => $faker->numberBetween(10, 50),
    ];
});
