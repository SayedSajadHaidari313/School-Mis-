<?php

namespace App\Models;

use App\Events\CustomerCreated;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'status',
    ];

    // protected $dispatchesEvents = [
    //     'created' => CustomerCreated::class,
    // ];

    // public function domains()
    // {
    //     return $this->hasMany(Domain::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->user?->getFilamentAvatarUrl(); // فراخوانی متد از مدل User
    }
}

