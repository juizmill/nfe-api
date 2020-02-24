<?php

namespace App\Http\Requests;

final class AddressRequest
{
    public static $customRoles = [
        'xLgr' => 'required|max:191',
        'nro' => 'required|max:60',
        'xCpl' => 'max:60',
        'cMun' => 'required|max:7',
        'xMun' => 'required|max:60',
        'UF' => 'required|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PR,PB,PA,PE,PI,RJ,RN,RS,RO,RR,SC,SE,SP,TO',
        'CEP' => 'required|max:8',
        'fone' => 'required|max:14'
    ];
}
