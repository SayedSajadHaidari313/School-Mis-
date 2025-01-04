<?php

use Illuminate\Support\Facades\Route;
use App\Mail\CustomerRegistered;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testroute', function() {
    $customer = Customer::find(1);
    Mail::to('sayedsajadhaidari1@gmail.com')->send(new CustomerRegistered($customer));
});