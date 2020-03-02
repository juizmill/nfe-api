<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transport;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {
    return [
        'xNome' => $faker->company,
        'IE' => null,
        'xEnder' => $faker->streetName,
        'xMun' => $faker->city,
        'UF' => $faker->stateAbbr,
        'CPFCNPJ' => $faker->cnpj(false),
        'type' => 'J'
    ];
});
