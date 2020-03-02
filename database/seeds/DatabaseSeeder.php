<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AddRoleAndPermissionFirstUserSeeder::class,
            TransportSeeder::class,
            VehicleSeeder::class
        ]);
    }
}
