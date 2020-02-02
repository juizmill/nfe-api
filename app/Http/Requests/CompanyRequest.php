<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class CompanyRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $person['email'] = 'required|max:190|unique:companies';

        $rules = [
            'regime' => 'max:120',
            'token_ibpt' => 'max:190',
            'csc_id' => 'max:120',
            'key_csc' => 'max:190',
            'certified' => 'max:190',
            'password_certified' => 'max:190',
            'ambient' => 'required|in:1,0',
            'logo_nfe' => 'max:190',
            'email_nfe' => 'max:190|unique:companies',
            'password_email_nfe' => 'max:190',
            'name' => 'required|max:190',
            'fantasy' => 'max:190',
            'identity' => 'numeric',
            'cnpj' => 'required|numeric|digits:14|unique:companies',
        ];

        $rules = $rules + $address + $person;

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;

            $rules['email'] = $rules['email'] . ',id,' . $id;
            $rules['email_nfe'] = $rules['email_nfe'] . ',id,' . $id;
            $rules['cnpj'] = $rules['cnpj'] . ',id,' . $id;
        }

        return $rules;
    }
}
