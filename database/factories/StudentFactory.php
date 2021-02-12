<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;
use App\Models\User;

$factory->define(Student::class, function (Faker $faker) {
    return [
        "user_id"        => function () {
            return User::all()->random();
        },
        "first_name"     => $faker->firstName(),
        "last_name"      => $faker->lastName(),
        "email"          => $faker->unique()->userName . $faker->randomElement(['@gmail.com', '@hotmail.com']),
        "phone"          => $faker->numerify('(##) ####-####'),
        "cellphone"      => $faker->numerify('(##) #####-####'),
        "class_price"    => $faker->randomFloat(2, 20, 150),
        "class_duration" => $faker->numberBetween(15, 60),
        "class_hour"     => $faker->time('H:i'),
        "notes"          => null,
        "active"         => true,
    ];
});
