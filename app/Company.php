<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $xNome
 * @property string $xFant
 * @property string $IE
 * @property string $IEST
 * @property string $IM
 * @property string $CNAE
 * @property string $CRT
 * @property string $CPFCNPJ
 * @property string $type
 * @property string $xLgr
 * @property string $nro
 * @property string $xCpl
 * @property string $xBairro
 * @property string $cMun
 * @property string $xMun
 * @property string $UF
 * @property string $CEP
 * @property string $cPais
 * @property string $xPais
 * @property string $fone
 * @property string $active
 */
class Company extends Model
{
    const CRT_ONE = 1;
    const CRT_TWO = 2;
    const CRT_THREE = 3;

    const JURIDICO = 'J';
    const FISICO = 'F';

    protected $fillable = [
        'xNome',
        'xFant',
        'IE',
        'IEST',
        'IM',
        'CNAE',
        'CRT',
        'CPFCNPJ',
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
        'active',
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
