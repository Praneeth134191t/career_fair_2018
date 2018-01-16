<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->unique()->regexify('^12(4|5)\d\d\d\w$'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => $faker->randomElement(['first_time' ,'active']),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Profile::class, function (Faker\Generator $faker) {

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'degree' => $faker->randomElement(['IT' ,'ITM']),
        'linkedinLink' => $faker->url,
        'objective' => $faker->paragraph(3),
        'techs' => str_replace([" ","."], [",",""], $faker->sentence),
        'user_id' => 1,
        'achievement_id' => 1,
        'final_project' => 1,

    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->firstName,
        'website' => $faker->url(),
        'description' => $faker->paragraph(),
    ];
});