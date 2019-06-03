<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        $address = AddressRequest::$customRoles;
        $person = PersonRequest::$customRoles;

        $rules = [
            'name' => 'require|max:255',
            'cpf' => 'require|numeric|digits:11',
            'birth' => 'date',
            'type_customer' => 'required|in:manufacturer,provider'
        ];

        $rules = array_merge($rules, $address, $person);

        return $rules;
    }
}
