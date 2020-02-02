<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerJuridicalRequest;
use Symfony\Component\HttpFoundation\Response;

class CustomerJuridicalController extends Controller
{
    public function index()
    {
        $custumers = Customer::paginate(15);

        return response()->json($custumers);
    }

    public function store(CustomerJuridicalRequest $request)
    {
        if ($customer = Customer::query()->create($request->toArray())) {
            return response()->json(
                $this->cleanFields($customer),
                Response::HTTP_CREATED
            );
        }

        return response()->json(self::ERROR_STORE, Response::HTTP_BAD_REQUEST);
    }

    public function show($id)
    {
        if ($customer = Customer::query()->find($id)) {
            return response()->json($this->cleanFields($customer), Response::HTTP_OK);
        }

        return response()->json(self::ERROR_SHOW, Response::HTTP_BAD_REQUEST);
    }

    public function update(CustomerJuridicalRequest $request, $id)
    {
        $data = $request->toArray();

        if ($customer = Customer::query()->find($id)) {
            if ($customer->update($data)) {
                return response()->json($this->cleanFields($customer), Response::HTTP_ACCEPTED);
            }
        }

        return response()->json(self::ERROR_UPDATE, Response::HTTP_BAD_REQUEST);
    }

    public function destroy($id)
    {
        if ($customer = Customer::query()->find($id)) {
            if ($customer->delete()) {
                return response()->json($this->cleanFields($customer), Response::HTTP_OK);
            }
        }

        return response()->json(self::ERROR_DESTROY, Response::HTTP_BAD_REQUEST);
    }

    public function cleanFields(Customer $customer)
    {
        unset($customer['cpf'], $customer['birth']);

        return $customer;
    }
}
