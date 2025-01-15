<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'package_id',
        'domain_id',
        'email_id',
        'order_date',
        'expire_date',
        'price',
        'status',
    ];
}
