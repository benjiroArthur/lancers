<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjctApplication;
use Faker\Generator as Faker;

$factory->define(ProjctApplication::class, function (Faker $faker) {
    return [
        'project_id' => App\Project::all()->random()->id,
        'freelancer_id' => App\Freelancer::all()->random()->id,

    ];
});
