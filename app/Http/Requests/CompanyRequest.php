<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Rules\CnpjOrCpfValidation;

class CompanyRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        $address = AddressRequest::$customRoles;

        $rules = [
            'xNome' => 'required|max:60',
            'xFant' => 'required|max:60',
            'IE' => 'max:14',
            'IEST' => 'max:14',
            'IM' => 'max:15',
            'CNAE' => 'max:7',
            'CRT' => 'required|in:1,2,3',
            'CPFCNPJ' => [
                'required',
                'max:14',
                new CnpjOrCpfValidation(),
                'unique:companies'
            ],
            'type' => 'required|in:J,F',
        ];

        $rules += $address;

        if ($request->method() == Request::METHOD_PUT) {
            $id = Request::instance()->id;
                unset($rules['CPFCNPJ'][3]);
                $rules['CPFCNPJ'] = array_merge(
                    $rules['CPFCNPJ'],
                    [ 'unique:companies,id,'.$id ]
                );
        }

        return $rules;
    }
}
