<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Meal;
use Faker\Generator as Faker;

$factory->define(\App\Models\Meal::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'genre' => $faker->word,
        'lastMade' => $faker->date,
        'cookTime' => $faker->randomNumber(),
        'prepTime' => $faker->randomNumber(),
        'ingredients' => json_encode([$faker->word, $faker->word])
    ];
    

    //$meal = new Meal($title,$lastMade,$genre,$cookTime,$prepTime,$ingredients);
    
    //return $meal;
});
