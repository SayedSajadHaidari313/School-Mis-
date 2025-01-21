<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'user_id',
        'package_id',
        'domain_id',
        'email_id',
        'order_date',
        'expire_date',
        'price',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id');
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
