<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerJuridicalRequest extends FormRequest
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
    public function rules()
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $rules = [
            'name' => 'require|max:255',
            'fantasy' => 'max:255',
            'company_identity' => 'numeric',
            'cnpj' => 'required|numeric|digits:14',
            'type_customer' => 'required|in:manufacturer,provider'
        ];

        $rules = array_merge($rules, $address, $person);

        return $rules;
    }
}
