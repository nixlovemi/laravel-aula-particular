<?php
# https://github.com/fzaninotto/Faker#basic-usage
# https://laravel.com/docs/8.x/database-testing

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        "email"      => $faker->unique()->userName . $faker->randomElement(['@gmail.com', '@hotmail.com']),
        "first_name" => $faker->firstName(),
        "last_name"  => $faker->lastName(),
        "password"   => (new User)->passwordHash("Sdrobs69"),
        "phone"      => $faker->numerify('(##) ####-####'),
        "cellphone"  => $faker->numerify('(##) #####-####'),
        "confirmed"  => $faker->randomElement([true, false]),
        "active"     => true,
        "created_at" => $faker->dateTimeBetween('-45 days', '-1 day'),
    ];
});
