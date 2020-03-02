<?php

use App\User;
use App\Transport;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function($user) {
            /** @var User $user */
            $transports = factory(Transport::class, 10)->make();
            $user->transports()->saveMany($transports);

        });
    }
}
