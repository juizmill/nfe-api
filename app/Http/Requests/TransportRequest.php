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
            'IE' => 'nullable|max:14',
            'xEnder' => 'required|max:60',
            'xMun' => 'required|max:60',
            'UF' => 'required|max:2',
            'CPFCNPJ' => [
                'required',
                'max:14',
                new CnpjOrCpfValidation()
            ],
            'type' => 'required|in:J,F',
        ];
    }
}
