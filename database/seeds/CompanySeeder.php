<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        factory(Company::class, 20)->create();
    }
}
