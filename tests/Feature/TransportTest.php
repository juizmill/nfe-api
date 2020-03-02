<?php

namespace Tests\Feature;

use App\Transport;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class TransportTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/transport',
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
        $response = $this->json(
            Request::METHOD_POST,
            '/v1/transport/store',
            [
                'xNome' => 'Teste 123',
                'IE' => '46546',
                'xEnder' => 'R. Tábata Flores',
                'xMun' => 'Vila Isaac',
                'UF' => 'MT',
                'CPFCNPJ' => '83597037000176',
                'type' => 'J'
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'xNome',
            'CPFCNPJ',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/transport/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'xNome'
            ]
        ]);
    }

    public function testUpdate()
    {
        $transport = factory(Transport::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/transport/{$transport->id}/update",
            [
                'xNome' => 'Teste 123',
                'IE' => '46546',
                'xEnder' => 'R. Tábata Flores',
                'xMun' => 'Vila Isaac',
                'UF' => 'MT',
                'CPFCNPJ' => '83597037000176',
                'type' => 'J'
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'xNome',
            'xMun',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/transport/100/update',
            [
                'xNome' => 'Teste 123',
                'IE' => null,
                'xEnder' => 'R. Tábata Flores',
                'xMun' => 'Vila Isaac',
                'UF' => 'MT',
                'CPFCNPJ' => '83597037000176',
                'type' => 'J'
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

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/transport/{$transport->id}/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'xNome'
        ]);
    }

    public function testDestroyReturnError()
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/transport/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
