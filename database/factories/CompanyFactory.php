<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'ambient' => false,
        'name' => $faker->company,
        'fantasy' => $faker->companySuffix,
        'cnpj' => $faker->cnpj(false),
        'active' => true,
        'type' => 'J',
        'cell_phone' => $faker->cellphoneNumber,
        'phone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'neighborhood' => $faker->citySuffix,
        'cep' => str_replace('-', '', $faker->postcode),
        'address' => $faker->streetName,
        'city' => $faker->city,
        'establishment_number' => $faker->buildingNumber,
        'state' => $faker->state,
        'uf' => $faker->stateAbbr
    ];
});
