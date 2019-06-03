<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyRequest extends FormRequest
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

        $person['email'] = 'required|max:255|unique:companies';

        $rules = [
            'regime' => 'max:120',
            'token_ibpt' => 'max:255',
            'csc_id' => 'max:120',
            'key_csc' => 'max:255',
            'certified' => 'max:255',
            'password_certified' => 'max:255',
            'ambient' => 'required|in:1,0',
            'logo_nfe' => 'max:255',
            'email_nfe' => 'max:255|unique:companies',
            'password_email_nfe' => 'max:255',
            'name' => 'required|max:255',
            'fantasy' => 'max:255',
            'identity' => 'numeric',
            'cnpj' => 'required|numeric|digits:14|unique:companies',
        ];

        $rules = $rules+$address+$person;

        if ($request->method() == Request::METHOD_PUT) {
            $data = $request->toArray();

            $rules['id'] = 'required|numeric';

            $rules['email'] = $rules['email'] . ',id,'. $data['id'];
            $rules['email_nfe'] = $rules['email_nfe'] . ',id,'. $data['id'];
            $rules['cnpj'] = $rules['cnpj'] . ',id,'. $data['id'];
        }

        return $rules;
    }
}
