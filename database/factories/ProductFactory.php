<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'item' => $faker->numberBetween(1),
        'cProd' => 'CFOP9999',
        'cEAN' => null,
        'xProd' => $faker->text(10),
        'NCM' => 00,
        'cBenef' => null,
        'EXTIPI' => null,
        'CFOP' => 1000,
        'uCom' => 'dz',
        'qCom' => 300,
        'vUnCom' => 30.00,
        'vProd' => 22.88,
        'cEANTrib' => null,
        'uTrib' => null,
        'qTrib' => null,
        'vUnTrib' => null,
        'vFrete' => null,
        'vSeg' => null,
        'vDesc' => null,
        'vOutro' => null,
        'indTot' => '0',
        'xPed' => null,
        'nItemPed' => null,
        'nFCI' => null,
    ];
});
