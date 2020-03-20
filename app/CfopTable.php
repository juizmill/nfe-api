<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property string $origin
 */
class CfopTable extends Model
{
    protected $fillable = [
        'name',
        'description',
        'origin'
    ];
}
