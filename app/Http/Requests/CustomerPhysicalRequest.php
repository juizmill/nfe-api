<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class CustomerPhysicalRequest extends BaseFormRequest
{
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

        $rules = $rules + $address + $person;

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;

            $rules['cpf'] = $rules['cpf'] . ',id,' . $id;
        }

        return $rules;
    }
}
