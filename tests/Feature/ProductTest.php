<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Http\Request;
use Tests\TestCaseAuthentication;

class ProductTest extends TestCaseAuthentication
{
    public function testIndex()
    {
        $response = $this->json(
            Request::METHOD_GET,
            '/v1/product',
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
            '/v1/product/store',
            [
                'item' => 300,
                'cProd' => 'CFOP9999',
                'cEAN' => null,
                'xProd' => 'Produto de teste',
                'NCM' => '00',
                'cBenef' => null,
                'EXTIPI' => null,
                'CFOP' => 1000,
                'uCom' => 'dz',
                'qCom' => 300,
                'vUnCom' => '30.00',
                'vProd' => '22.88',
                'cEANTrib' => null,
                'uTrib' => null,
                'qTrib' => null,
                'vUnTrib' => null,
                'vFrete' => null,
                'vSeg' => null,
                'vDesc' => null,
                'vOutro' => null,
                'indTot' => '0',
                'xPed' => null,
                'nItemPed' => null,
                'nFCI' => null
            ],
            $this->customHeaders
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'xProd',
            'NCM',
            'id'
        ]);
    }

    public function testStoreErrorValidation()
    {
        $response = $this->json(
            'POST',
            '/v1/product/store',
            [],
            $this->customHeaders
        );

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'xProd'
            ]
        ]);
    }

    public function testUpdate()
    {
        $company = factory(Product::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_PUT,
            "/v1/product/{$company->id}/update",
            [
                'item' => 300,
                'cProd' => 'CFOP9999',
                'xProd' => 'Produto de teste update',
                'NCM' => '00',
                'CFOP' => 1000,
                'uCom' => 'dz',
                'qCom' => 300,
                'vUnCom' => '30.00',
                'vProd' => '22.88',
                'indTot' => '0',
            ],
            $this->customHeaders
        );

        $response->assertStatus(202);
        $response->assertJsonStructure([
            'qCom',
            'vUnCom',
            'id'
        ]);
    }

    public function testUpdateErrorValidation()
    {
        $response = $this->json(
            Request::METHOD_PUT,
            '/v1/product/100/update',
            [
                'item' => 300,
                'cProd' => 'CFOP9999',
                'xProd' => 'Produto de teste update',
                'NCM' => '00',
                'CFOP' => 1000,
                'uCom' => 'dz',
                'qCom' => 300,
                'vUnCom' => '30.00',
                'vProd' => '22.88',
                'indTot' => '0',
            ],
            $this->customHeaders
        );

        $response->assertStatus(406);
    }

    public function testDestroySuccess()
    {
        $company = factory(Product::class)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/product/{$company->id}/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'xProd'
        ]);
    }

    public function testDestroyReturnError()
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            "/v1/product/100/destroy",
            [],
            $this->customHeaders
        );

        $response->assertStatus(404);
    }
}
