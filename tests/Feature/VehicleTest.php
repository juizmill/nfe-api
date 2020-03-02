<?php

namespace Tests\Feature;

use App\Vehicle;
use App\Transport;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class VehicleTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/transport/vehicle',
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total'
        ]);
    }

    public function testStore()
    {
        $transport = factory(Transport::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_POST,
            '/v1/transport/vehicle/store',
            [
                'placa' => 'ABC1111',
                'UF' => 'RJ',
                'RNTC' => '999999',
                'reboque' => true,
                'transport_id' => $transport->id,
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'placa',
            'UF',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/transport/vehicle/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'placa'
            ]
        ]);
    }

    public function testUpdate()
    {
        $transport = factory(Transport::class)->create([
            'user_id' => $this->user->id
        ]);

        $vehicle = factory(Vehicle::class)->create([
            'user_id' => $this->user->id,
            'transport_id' => $transport->id
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/transport/vehicle/{$vehicle->id}/update",
            [
                'placa' => 'ABC1112',
                'UF' => 'BR',
                'RNTC' => '88888',
                'reboque' => false,
                'transport_id' => $transport->id,
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'placa',
            'UF',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $transport = factory(Transport::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/transport/vehicle/100/update',
            [
                'placa' => 'ABC1112',
                'UF' => 'BR',
                'RNTC' => '88888',
                'reboque' => false,
                'transport_id' => $transport->id,
            ],
            $this->customHeaders
        );

        $response->assertStatus(406);
    }

    public function testDestroySuccess()
    {
        $transport = factory(Transport::class)->create([
            'user_id' => $this->user->id
        ]);

        $vehicle = factory(Vehicle::class)->create([
            'user_id' => $this->user->id,
            'transport_id' => $transport->id
        ]);

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/transport/vehicle/{$vehicle->id}/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'placa'
        ]);
    }

    public function testDestroyReturnError()
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/transport/vehicle/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
