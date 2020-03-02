<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    const IND_IE_DEST_ONE = 1;
    const IND_IE_DEST_TWO = 2;
    const IND_IE_DEST_NINE = 9;

    const JURIDICO = 'J';
    const FISICO = 'F';

    protected $fillable = [
        'xNome',
        'indIEDest',
        'IE',
        'ISUF',
        'IM',
        'email',
        'CPFCNPJ',
        'idEstrangeiro',
        'type',
        'xLgr',
        'nro',
        'xCpl',
        'xBairro',
        'cMun',
        'xMun',
        'UF',
        'CEP',
        'cPais',
        'xPais',
        'fone',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
