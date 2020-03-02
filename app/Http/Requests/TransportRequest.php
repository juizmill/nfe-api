<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Rules\CnpjOrCpfValidation;

class TransportRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        return [
            'xNome' => 'required|max:60',
            'IE' => 'max:14',
            'xEnder' => 'max:60',
            'xMun' => 'max:60',
            'UF' => 'max:2',
            'CPFCNPJ' => [
                'required',
                'max:14',
                new CnpjOrCpfValidation()
            ],
            'type' => 'required|in:J,F',
        ];
    }
}
