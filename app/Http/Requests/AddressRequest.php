<?php

namespace App\Http\Requests;

final class AddressRequest
{
    public static $customRoles = [
        'neighborhood' => 'required|max:80',
        'cep' => 'required|numeric|size:8',
        'complement' => 'max:80',
        'address' => 'required|max:255',
        'city' => 'required|max:150',
        'establishment_number' => 'required|max80',
        'state' => 'required|max:120',
        'uf' => 'required|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PR,PB,PA,PE,PI,RJ,RN,RS,RO,RR,SC,SE,SP,TO'
    ];
}
