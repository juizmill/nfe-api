<?php

use App\Transport;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    public function run()
    {
        factory(Transport::class, 10)->create();
    }
}
