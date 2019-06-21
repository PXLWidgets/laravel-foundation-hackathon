<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Resourceable;
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
    $resourcables = [
        App\Course::class,
        App\Question::class,
    ];

    // Add new noteables here as we make them
    $resourcableType = $faker->randomElement($resourcables);
    $resourcable = factory($resourcableType)->create();

    return [
        'resource_id' => factory($resourcableType)->create()->id,
        'resourceable_type' => $resourcableType,
        'resourceable_id' => $resourcable->id
    ];
});
