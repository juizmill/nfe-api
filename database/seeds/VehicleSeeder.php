<?php

use App\Vehicle;
use App\Transport;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Transport::all()->each(function ($transport) {
            /** @var Transport $transport */
            $user = $transport->user()->get()->first();

            $vehicle = factory(Vehicle::class, 3)->make([
                'user_id' => $user->id
            ]);

            $transport->vehicles()->saveMany($vehicle);
        });
    }
}
