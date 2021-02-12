<?php
# https://github.com/fzaninotto/Faker#basic-usage
# https://laravel.com/docs/8.x/database-testing

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserPlan;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Plan;

$factory->define(UserPlan::class, function (Faker $faker) {
    return [
        "user_id"    => function () {
            return User::all()->random();
        },
        "plan_id"    => function () {
            return Plan::all()->random();
        },
        "created_at" => $faker->dateTimeBetween('-45 days', '-1 day'),
    ];
});
