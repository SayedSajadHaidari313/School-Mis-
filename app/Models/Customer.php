<?php

namespace App\Models;

use App\Events\CustomerCreated;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
    ];

    protected $dispatchesEvents = [
        'created' => CustomerCreated::class,
    ];

    // public function domains()
    // {
    //     return $this->hasMany(Domain::class);
    // }
}
