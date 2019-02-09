<?php

use Faker\Generator as Faker;

$factory->define(App\Medicament::class, function (Faker $faker) {
    return [
        'title'=> $faker->text(25),
        'description'=> $faker->text(50)
    ];
});
