<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Rules\CnpjOrCpfValidation;

class CustomerRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        $address = AddressRequest::$customRoles;

        $rules = [
            'xNome' => 'required|max:60',
            'indIEDest' => 'in:1,2,9',
            'IE' => 'max:14',
            'ISUF' => 'max:9',
            'IM' => 'max:15',
            'email' => 'max:60|email',
            'CPFCNPJ' => [
                'required',
                'max:14',
                new CnpjOrCpfValidation()
            ],
            'idEstrangeiro' => 'max:20',
            'type' => 'required|in:J,F',
        ];

        $rules = $rules + $address;

        return $rules;
    }
}
