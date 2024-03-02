<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        'name',
        'itemType',
        'measureName',
        'quantity',
        'price',
        'costPrice',
        'sumPrice',
        'tax',
        'taxPercent',
        'discount'
    ];
    protected $keyType = 'string';
    public $timestamps = false;
}
