<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Question;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Question::class, function (Faker $faker) {
    return [
        'course_id' => random_int(1, 10),
        'order' => random_int(-2147483648, 2147483647),
        'question' => $faker->sentence(),
        'type' => $faker->sentence()
    ];
});
