<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' =>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'thumbnail' =>$faker->imageUrl($width = 640, $height = 480),
        'description'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'content' =>$faker->text($maxNbChars = 200) ,
        'slug' =>str_slug($faker->sentence($nbWords = 6, $variableNbWords = true)),
        'user_id' => 1,
    ];
});
