<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $item
 * @property string $cProd
 * @property string $cEAN
 * @property string $xProd
 * @property string $NCM
 * @property string $cBenef
 * @property string $EXTIPI
 * @property string $CFOP
 * @property string $uCom
 * @property string $qCom
 * @property string $vUnCom
 * @property string $vProd
 * @property string $cEANTrib
 * @property string $uTrib
 * @property string $qTrib
 * @property string $vUnTrib
 * @property string $vFrete
 * @property string $vSeg
 * @property string $vDesc
 * @property string $vOutro
 * @property string $indTot
 * @property string $xPed
 * @property string $nItemPed
 * @property string $nFCI
 */
class Product extends Model
{
    protected $fillable = [
        'item',
        'cProd',
        'cEAN',
        'xProd',
        'NCM',
        'cBenef',
        'EXTIPI',
        'CFOP',
        'uCom',
        'qCom',
        'vUnCom',
        'vProd',
        'cEANTrib',
        'uTrib',
        'qTrib',
        'vUnTrib',
        'vFrete',
        'vSeg',
        'vDesc',
        'vOutro',
        'indTot',
        'xPed',
        'nItemPed',
        'nFCI',
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
