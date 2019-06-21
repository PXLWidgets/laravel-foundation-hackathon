<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Answers;
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

$factory->define(Answers::class, function (Faker $faker) {
    return [
        'question_id' => random_int(1, 10),
        'answer' => $faker->sentence(),
        'is_correct' => $faker->boolean()
    ];
});