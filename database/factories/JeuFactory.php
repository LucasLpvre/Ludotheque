<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jeux;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Jeux::class, function (Faker $faker) {
    return [
        'nom' => $faker->name,
        'AnneeS' => $faker->numberBetween($min = 1945, $max = 2019),
        'ageMax' => $faker->randomElement($array = array('3+', '6+', '12+', '18+')),
        'nbJoueurMinMax' =>$faker->text($maxNbChars = 255),
        'dureePartieMaxMin' => $faker->text($maxNbChars = 255),
        'description' => $faker->text($maxNbChars = 1000),
    ];
});
