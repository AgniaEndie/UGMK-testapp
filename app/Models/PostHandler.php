<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHandler extends Model
{

    protected $fillable=[
        "id",
        "post",
        "check_code",
        "comment",
        "status"
    ];

    protected $keyType = 'string';
    public $timestamps = false;
}
