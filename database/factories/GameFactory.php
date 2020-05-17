<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'price' => rand(100, 1000),
        'name' => $faker->name,
        'description' => $faker->text,
        'developer' => $faker->name,
        'publisher' => '',
        'release_date' => $faker->date,
        'image_path' => '\images\games\1.png',
        'game_path' => '\\'
    ];
});
