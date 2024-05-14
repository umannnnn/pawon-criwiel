<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_WAITING_CONFIRMATION = 'Menunggu konfirmasi';
    const STATUS_CONFIRMED = 'Dikonfirmasi';
    const STATUS_PROCESSING = 'Sedang diproses';
    const STATUS_COMPLETED = 'Selesai';

    protected $fillable = [
        'product',
        'invoice',
        'quantity',
        'name',
        'customer',
        'address',
        'phone',
        'desc',
        'price',
        'status', // tambahkan kolom status ke fillable
        'payment_proof',
    ];
}

