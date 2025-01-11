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
    public function list_service()
    {
        return $this->belongsTo(ListService::class);
    }
}
