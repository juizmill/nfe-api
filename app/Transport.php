<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'xNome',
        'IE',
        'xEnder',
        'xMun',
        'UF',
        'CPFCNPJ',
        'type'
    ];
}
