<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobOffered;
use Faker\Generator as Faker;

$factory->define(\App\JobOffered::class, function (Faker $faker) {
    return [
        'project_id' => App\Project::all()->random()->id,
        'freelancer_id' => App\Freelancer::all()->random()->id,
    ];
});
