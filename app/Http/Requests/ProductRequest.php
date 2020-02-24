<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class ProductRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        return [
            'item' => 'integer',
            'cProd' => 'required|max:60',
            'cEAN' => 'nullable|max:14',
            'xProd' => 'required|max:120',
            'NCM' => 'nullable|max:8',
            'cBenef' => 'nullable|max:191',
            'EXTIPI' => 'nullable|max:3',
            'CFOP' => 'required|max:4',
            'uCom' => 'required|max:6',
            'qCom' => 'required|max:4',
            'vUnCom' => 'required|numeric|between:0,99.99',
            'vProd' => 'required|numeric|between:0,99.99',
            'cEANTrib' => 'nullable|max:14',
            'uTrib' => 'nullable|max:6',
            'qTrib' => 'nullable|max:191',
            'vUnTrib' => 'nullable|numeric|between:0,99.99',
            'vFrete' => 'nullable|numeric|between:0,99.99',
            'vSeg' => 'nullable|numeric|between:0,99.99',
            'vDesc' => 'nullable|numeric|between:0,99.99',
            'vOutro' => 'nullable|numeric|between:0,99.99',
            'indTot' => 'nullable|in:0,1',
            'xPed' => 'nullable|max:15',
            'nItemPed' => 'nullable|max:6',
            'nFCI' => 'nullable|max:36',
        ];
    }
}
