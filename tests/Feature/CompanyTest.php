<?php

namespace Tests\Feature;

use App\Company;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class CompanyTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/company',
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
            '/v1/company/store',
            [
                'xNome' => 'Company Teste',
                'xFant' => 'Teste 123',
                'IE' => '54654',
                'IEST' => '5545',
                'IM' => '5212',
                'CNAE' => '12313',
                'CRT' => '1',
                'CPFCNPJ' => '68308429000184',
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
            'xFant',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/company/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'xNome',
                'xFant',
                'CPFCNPJ'
            ]
        ]);
    }

    public function testUpdate()
    {
        $company = factory(Company::class)->create([
            'user_id' => 1
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/company/{$company->id}/update",
            [
                'xNome' => 'Company Teste',
                'xFant' => 'Teste 123',
                'IE' => '54654',
                'IEST' => '5545',
                'IM' => '5212',
                'CNAE' => '12313',
                'CRT' => '1',
                'CPFCNPJ' => '12785448000147',
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
            'xFant',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/company/100/update',
            [
                'xNome' => 'Company Teste',
                'xFant' => 'Teste 123',
                'IE' => '54654',
                'IEST' => '5545',
                'IM' => '5212',
                'CNAE' => '12313',
                'CRT' => '1',
                'CPFCNPJ' => '12785448000147',
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
        $company = factory(Company::class)->create([
            'user_id' => 1
        ]);

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/company/{$company->id}/destroy",
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
            "/v1/company/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
