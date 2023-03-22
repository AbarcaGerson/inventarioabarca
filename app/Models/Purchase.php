<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'user_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture',
    ];

}
