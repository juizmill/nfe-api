<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerPhysicalRequest;
use Symfony\Component\HttpFoundation\Response;

class CustomerPhysicalController extends Controller
{
    public function store(CustomerPhysicalRequest $request)
    {
        if ($customer = Customer::query()->create($request->toArray())) {
            return response()->json([
                'message' => 'Cadastro realizado com sucesso!',
                'customer' => $this->cleanFields($customer)
            ], Response::HTTP_CREATED);
        }

        return response()->json([
            'message' => 'Não foi possível cadastrar. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request)
    {
        $data = $request->toArray();

        if ($customer = Customer::query()->find($data['id'])) {
            return response()->json([
                'customer' => $this->cleanFields($customer)
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Não foi possível localizar. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function update(CustomerPhysicalRequest $request)
    {
        $data = $request->toArray();

        if ($customer = Customer::query()->find($data['id'])) {
            if ($customer->update($data)) {
                return response()->json([
                    'message' => 'Atualizado com sucesso!',
                    'customer' => $this->cleanFields($customer)
                ], Response::HTTP_ACCEPTED);
            }
        }

        return response()->json([
            'message' => 'Não foi possível atualizar. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request)
    {
        $data = $request->toArray();

        if ($customer = Customer::query()->find($data['id'])) {
            if ($customer->delete()) {
                return response()->json([
                    'message' => 'Removido com sucesso!',
                    'customer' => $this->cleanFields($customer)
                ], Response::HTTP_OK);
            }
        }

        return response()->json([
            'message' => 'Não foi possível remover. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function cleanFields(Customer $customer)
    {
        unset($customer['fantasy'], $customer['company_identity'], $customer['cnpj']);

        return $customer;
    }
}
