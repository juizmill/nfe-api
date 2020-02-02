<?php

use App\User;
use App\Company;
use App\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();
        factory(Company::class, 4)->create();
        factory(Customer::class, 10)->create();
    }
}
