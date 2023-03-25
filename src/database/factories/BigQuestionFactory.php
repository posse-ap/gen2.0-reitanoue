<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Model;
use App\BigQuestion;
use Faker\Generator as Faker;

// $factory->define(Model::class, function (Faker $faker) {
//     return [
//         'name' => $this->faker->name(),
//     ];
// });

$factory->define(BigQuestion::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
