<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->sentences(1,true),
        'model' => $faker->name(),
        'year' => $faker->biasedNumberBetween($min = 1990, $max = 2018),
        'maxSpeed' => $faker->biasedNumberBetween($min = 120, $max = 260),
        'isAutomatic' => $faker->boolean($chanceOfGettingTrue = 50),
        'engine' => $faker->biasedNumberBetween($min = 1000, $max = 2000),
        'numberOfDoors' =>$faker->biasedNumberBetween($min = 3, $max = 5)
    ];
});
