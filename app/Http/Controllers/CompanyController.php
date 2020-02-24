<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Service\MaterialTable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CompanyRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = (new MaterialTable($request, Company::query()))
            ->setColumns(['xNome', 'xFant', 'fone', 'active', 'created_at'])
            ->pagination();

        return response()->json($companies);
    }

    public function store(CompanyRequest $request)
    {
        try {
            $data = $request->only([
                'xNome',
                'xFant',
                'IE',
                'IEST',
                'IM',
                'CNAE',
                'CRT',
                'CPFCNPJ',
                'type',
                'xLgr',
                'nro',
                'xCpl',
                'xBairro',
                'cMun',
                'xMun',
                'UF',
                'CEP',
                'cPais',
                'xPais',
                'fone',
            ]);

            $data['user_id'] = auth('api')->user()->id;
            $company = Company::query()->create($data);

            return response()->json($company, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $company = Company::query()->findOrFail($id);
            return response()->json($company, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(CompanyRequest $request, $id)
    {
        try {
            $company = Company::query()->findOrFail($id);
            $data = $request->only([
                'xNome',
                'xFant',
                'IE',
                'IEST',
                'IM',
                'CNAE',
                'CRT',
                'CPFCNPJ',
                'type',
                'xLgr',
                'nro',
                'xCpl',
                'xBairro',
                'cMun',
                'xMun',
                'UF',
                'CEP',
                'cPais',
                'xPais',
                'fone',
            ]);

            $data['user_id'] = auth('api')->user()->id;

            $company->update($data);

            return response()->json($company, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
            $company = Company::query()->findOrFail($id);
            $company->delete();

            return response()->json($company, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }
}
