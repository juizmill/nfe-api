<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    public function store(CompanyRequest $request)
    {
        if ($company = Company::query()->create($request->toArray())) {
            return response()->json([
                'message' => 'Cadastro realizado com sucesso!',
                'company' => $company
            ], Response::HTTP_CREATED);
        }

        return response()->json([
            'message' => 'Não foi possível cadastrar. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(Request $request)
    {
        $data = $request->toArray();

        if ($company = Company::query()->find($data['id'])) {
            return response()->json([
                'company' => $company
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Não foi possível localizar. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function update(CompanyRequest $request)
    {
        $data = $request->toArray();

        if ($company = Company::query()->find($data['id'])) {
            if ($company->update($data)) {
                return response()->json([
                    'message' => 'Atualizado com sucesso!',
                    'company' => $company
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

        if ($company = Company::query()->find($data['id'])) {
            if ($company->delete()) {
                return response()->json([
                    'message' => 'Removido com sucesso!',
                    'company' => $company
                ], Response::HTTP_OK);
            }
        }

        return response()->json([
            'message' => 'Não foi possível remover. Tente novamente!'
        ], Response::HTTP_BAD_REQUEST);
    }
}
