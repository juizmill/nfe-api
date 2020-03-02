<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $xNome
 * @property string $IE
 * @property string $xEnder
 * @property string $xMun
 * @property string $UF
 * @property string $CPFCNPJ
 * @property string $type
 * @property integer $user_id
 */
class Transport extends Model
{
    protected $fillable = [
        'xNome',
        'IE',
        'xEnder',
        'xMun',
        'UF',
        'CPFCNPJ',
        'type',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
