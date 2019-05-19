<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $typeCustomer = ['fabricante', 'fornecedor'];
    return [
        'type_customer' => $typeCustomer[rand(0,1)],
        'name' => $faker->name,
        'cpf' => $faker->cpf(false),
        'birth' => $faker->date(),
        'active' => true,
        'type' => 'F',
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
