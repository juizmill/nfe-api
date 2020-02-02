<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class CustomerJuridicalRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $rules = [
            'name' => 'required|max:255',
            'fantasy' => 'max:255',
            'company_identity' => 'numeric',
            'cnpj' => 'required|numeric|digits:14|unique:customers',
            'type_customer' => 'required|in:manufacturer,provider'
        ];

        $rules = $rules + $address + $person;

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;

            $rules['cnpj'] = $rules['cnpj'] . ',id,' . $id;
        }

        return $rules;
    }
}
