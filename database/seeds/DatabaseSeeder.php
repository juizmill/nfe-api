<?php

use App\User;
use App\Company;
use App\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Company::class, 20)->create();
        factory(Customer::class, 10)->create();
    }
}
