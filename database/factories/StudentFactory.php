<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'firstname'=>$faker->name(),
        'lastname'=>$faker->name(),
        'age'=>$faker->numberBetween(18,30),
        'speciality'=>$faker->word(),
    ];
});
