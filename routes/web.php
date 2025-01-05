<?php

use Illuminate\Support\Facades\Route;
use App\Mail\CustomerRegistered;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testroute', function() {
    return view('Mail.customer_registered');
});

// Customer Routes
// Route::group(['prefix' => 'customer'], function () {
//     Route::get('/login', function() {
//         return view('customer.login');
//     })->name('customer.login');
// });