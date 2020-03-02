<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    $reboque = [true, false];
    return [
        'placa' => 'ABC1111',
        'UF' => 'RJ',
        'RNTC' => '999999',
        'reboque' => $reboque[rand(0, 1)],
    ];
});
