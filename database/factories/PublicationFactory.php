<?php
use Faker\Generator as Faker;

$factory->define(\App\Publication::class, function (Faker $faker) {
    return [
        'title' =>$faker->text(25),
        'description' =>$faker->text(50),
        'maladie' =>$faker->text(25),
        'ordonnance' =>$faker->text(25),
        'quantite' =>$faker->numberBetween(1,10),
        'time_need' =>$faker->date(),
        'user_id' =>$faker->numberBetween(50,10000),
        'medicament_id' =>$faker->numberBetween(50,10000),
    ];
});
