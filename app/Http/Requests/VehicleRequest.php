<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleRequest extends BaseFormRequest
{
    public function rules(Request $request)
    {
        return [
            'placa' => 'required|max:60',
            'UF' => 'required|max:2',
            'RNTC' => 'required|max:20',
            'reboque' => 'required|boolean',
            'transport_id' => [
                'required',
                Rule::exists('transports', 'id')->where(function ($query) {
                    $user = auth('api')->user();
                    return $query->where('user_id', $user->id);
                }),
            ]
        ];
    }
}
