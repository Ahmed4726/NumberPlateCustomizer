<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',         // ID of the user who placed the order
        'full_name',       // Full name of the customer
        'email',           // Customer's email address
        'address',         // Shipping address
        'total_amount',    // Total order amount
        'order_details',   // JSON field containing plate details
        'payment_status',  // Payment status (e.g., 'pending', 'completed')
        'transaction_id',  // PayPal transaction ID
        'order_status',
    ];
}
