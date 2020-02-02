<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(15);

        return response()->json($companies);
    }

    public function store(CompanyRequest $request)
    {
        if ($company = Company::query()->create($request->toArray())) {
            return response()->json($company, Response::HTTP_CREATED);
        }

        return response()->json(self::ERROR_STORE, Response::HTTP_BAD_REQUEST);
    }

    public function show($id)
    {
        if ($company = Company::query()->find($id)) {
            return response()->json($company, Response::HTTP_OK);
        }

        return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
    }

    public function update(CompanyRequest $request, $id)
    {
        if ($company = Company::query()->find($id)) {
            $data = $request->toArray();

            if ($company->update($data)) {
                return response()->json($company, Response::HTTP_ACCEPTED);
            }
        }

        return response()->json(self::ERROR_UPDATE, Response::HTTP_BAD_REQUEST);
    }

    public function destroy($id)
    {
        if ($company = Company::query()->find($id)) {
            if ($company->delete()) {
                return response()->json($company, Response::HTTP_OK);
            }
        }

        return response()->json(self::ERROR_DESTROY, Response::HTTP_BAD_REQUEST);
    }
}
