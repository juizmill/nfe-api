<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $placa
 * @property string $UF
 * @property string $RNTC
 * @property boolean $reboque
 * @property integer $user_id
 * @property integer $transport_id
 */
class Vehicle extends Model
{
    protected $fillable = [
        'placa',
        'UF',
        'RNTC',
        'reboque',
        'user_id',
        'transport_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class);
    }
}
