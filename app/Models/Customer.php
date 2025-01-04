<?php

namespace App\Models;

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
    // public function domains()
    // {
    //     return $this->hasMany(Domain::class);
    // }

}
