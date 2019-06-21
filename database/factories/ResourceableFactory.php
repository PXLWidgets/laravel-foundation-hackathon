<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Resourceable;
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

$factory->define(Resourceable::class, function (Faker $faker) {
    return [
        'resource_id' => random_int(1, 10),
        'resourceable_id' => random_int(0, 18446744073709551615),
        'resourceable_type' => $faker->sentence()
    ];
});
