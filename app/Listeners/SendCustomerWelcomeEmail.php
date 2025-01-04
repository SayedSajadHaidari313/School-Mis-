<?php

namespace App\Listeners;

use App\Events\CustomerCreated;
use App\Mail\CustomerRegistered;
use Illuminate\Support\Facades\Mail;

class SendCustomerWelcomeEmail
{
    /**
     * Handle the event.
     */
    public function handle(CustomerCreated $event): void
    {
        Mail::to($event->customer->email)
            ->send(new CustomerRegistered($event->customer));
    }
}
