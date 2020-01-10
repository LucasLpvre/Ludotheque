<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commentaires;
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

$factory->define(Commentaires::class, function (Faker $faker) {
    return [
        'titre' => $faker->text($maxNbChars = 255),
        'body' => $faker->text($maxNbChars = 1000),
        'auteur' =>$faker->name,
        'jeux_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
