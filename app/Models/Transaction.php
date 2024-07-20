<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'stripe_payment_id',
        'customer_email',
        'amount',
        'currency',
        'status',
    ];
}
