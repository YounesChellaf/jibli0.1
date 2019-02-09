<?php

use Faker\Generator as Faker;

$factory->define(App\Profil::class, function (Faker $faker) {
    return [
        'pseudo' =>$faker->text(25),
        'avatar'  =>$faker->text(25),
        'sexe'=> 'homme',
        'age' =>$faker->numberBetween(10,50),
        'nb_post' =>$faker->numberBetween(1,10),
        'location'=> $faker->text(25),
        'review' => $faker->numberBetween(0,5),
    ];
});
