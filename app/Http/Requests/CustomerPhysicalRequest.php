<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CustomerPhysicalRequest extends FormRequest
{
    /**
     * {@inheritDoc}
     */
    public function authorize()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function rules(Request $request)
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $rules = [
            'name' => 'required|max:255',
            'cpf' => 'required|numeric|digits:11|unique:customers',
            'birth' => 'date',
            'type_customer' => 'required|in:manufacturer,provider'
        ];

        $rules = $rules+$address+$person;

        if ($request->method() == Request::METHOD_PUT) {
            $data = $request->toArray();

            $rules['id'] = 'required|numeric';
            $rules['cpf'] = $rules['cpf'] . ',id,'. $data['id'];
        }

        return $rules;
    }
}
