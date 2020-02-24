<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class CustomerTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/customer',
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
            '/v1/customer/store',
            [
                'xNome' => 'teste 123',
                'CPFCNPJ' => '19871154000187',
                'type' => 'J',
                'xLgr' => 'Rua da Pipa',
                'nro' => '231',
                'xCpl' => 'Casa',
                'xBairro' => 'Monte Castelo',
                'cMun' => '12345',
                'xMun' => 'Mato Grosso do Sul',
                'UF' => 'MS',
                'CEP' => '79645040',
                'cPais' => '1058',
                'xPais' => 'Brasil',
                'fone' => '992259401'
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'xNome',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/customer/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'xNome',
                'CPFCNPJ'
            ]
        ]);
    }

    public function testUpdate()
    {
        $customer = factory(Customer::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/customer/{$customer->id}/update",
            [
                'xNome' => 'teste 123',
                'CPFCNPJ' => '19871154000187',
                'type' => 'J',
                'xLgr' => 'Rua da Pipa',
                'nro' => '231',
                'xCpl' => 'Casa',
                'xBairro' => 'Monte Castelo',
                'cMun' => '12345',
                'xMun' => 'Mato Grosso do Sul',
                'UF' => 'MS',
                'CEP' => '79645040',
                'cPais' => '1058',
                'xPais' => 'Brasil',
                'fone' => '992259401'
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'xNome',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/customer/100/update',
            [
                'xNome' => 'teste 123',
                'CPFCNPJ' => '19871154000187',
                'type' => 'J',
                'xLgr' => 'Rua da Pipa',
                'nro' => '231',
                'xCpl' => 'Casa',
                'xBairro' => 'Monte Castelo',
                'cMun' => '12345',
                'xMun' => 'Mato Grosso do Sul',
                'UF' => 'MS',
                'CEP' => '79645040',
                'cPais' => '1058',
                'xPais' => 'Brasil',
                'fone' => '992259401'
            ],
            $this->customHeaders
        );

        $response->assertStatus(406);
    }

    public function testDestroySuccess()
    {
        $customer = factory(Customer::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/customer/{$customer->id}/destroy",
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
            "/v1/customer/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
