<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $rules = [
            'regime' => 'max:120',
            'token_ibpt' => 'max:255',
            'csc_id' => 'max:120',
            'key_csc' => 'max:255',
            'certified' => 'max:255',
            'password_certified' => 'max:255',
            'ambient' => 'required|in:1,0',
            'logo_nfe' => 'max:255',
            'email_nfe' => 'max:255',
            'password_email_nfe' => 'max:255',
            'name' => 'require|max:255',
            'fantasy' => 'max:255',
            'identity' => 'numeric',
            'cnpj' => 'require|numeric|max:14',
        ];

        $rules = array_merge($rules, $address, $person);

        return $rules;
    }
}
