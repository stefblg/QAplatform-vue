<?php

use Faker\Generator as Faker;
use App\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5, 10)), '.'),
        'body' => $faker->paragraph(rand(3, 7), true),
        'views' => rand(3,7),
        'answers' => rand(0,5),
        'votes' => rand(-3, 10)
    ];
});
