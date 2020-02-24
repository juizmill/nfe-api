<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Service\MaterialTable;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CustomerRequest;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = (new MaterialTable($request, $this->customerBuilder()))
            ->setColumns(['xNome', 'fone', 'active', 'created_at'])
            ->pagination();

        return response()->json($customers);
    }

    public function store(CustomerRequest $request)
    {
        try {
            $data = $request->only([
                'xNome',
                'indIEDest',
                'IE',
                'ISUF',
                'IM',
                'email',
                'CPFCNPJ',
                'idEstrangeiro',
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
            $customer = Customer::query()->create($data);

            return response()->json($customer, Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_STORE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function show($id)
    {
        try {
            $customer = $this->customerBuilder()->findOrFail($id);
            return response()->json($customer, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(CustomerRequest $request, $id)
    {
        try {
            $customer = $this->customerBuilder()->findOrFail($id);
            $data = $request->only([
                'xNome',
                'indIEDest',
                'IE',
                'ISUF',
                'IM',
                'email',
                'CPFCNPJ',
                'idEstrangeiro',
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

            $customer->update($data);

            return response()->json($customer, Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_UPDATE, Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function destroy($id)
    {
        try {
           $customer = $this->customerBuilder()->findOrFail($id);
           $customer->delete();

            return response()->json($customer, Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            Log::info($exception->getMessage());
            Log::warning($exception->getTraceAsString());
            return response()->json(self::ERROR_DESTROY, Response::HTTP_NOT_FOUND);
        }
    }

    protected function customerBuilder(): Builder
    {
        $user = auth('api')->user();
        return Customer::query()
            ->where('user_id', '=', $user->id);
    }
}
