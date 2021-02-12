<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        "name"        => ucfirst($faker->unique()->word()),
        "json_config" => null,
        "active"      => true,
    ];
});
