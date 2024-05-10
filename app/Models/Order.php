<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'invoice',
        'quantity',
        'name',
        'customer',
        'address',
        'phone',
        'desc',
        'payment_proof',
    ];
}
