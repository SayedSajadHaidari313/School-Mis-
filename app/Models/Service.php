<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'list_service_id',
        'service_type',
        'price',
        'order_date',
        'expiration_date',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function listService()
    {
        return $this->belongsTo(ListService::class);
    }
}
