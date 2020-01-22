<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transacciones;
use Faker\Generator as Faker;

$factory->define(Transacciones::class, function (Faker $faker) {
    return [
        'estudiante_id' => rand(2,12),
        'respuesta_id' => rand(19,21),
        'tema_id' => rand(1,7),
        'pregunta_id' => 14, // password
        'valoracion' => rand(4,5),
    ];
});
