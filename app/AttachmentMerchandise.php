<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachmentMerchandise extends Model
{
    protected $fillable = [
        'cest',
        'ncm',
        'item',
        'description',
        'goods_segments_id'
    ];
}
