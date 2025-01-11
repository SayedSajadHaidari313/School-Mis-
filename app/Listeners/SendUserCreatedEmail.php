<?php

namespace App\Listeners;

use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;

class SendUserCreatedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        Mail::to($event->user->email)
        ->send(new UserCreated($event->user));
    }
}
