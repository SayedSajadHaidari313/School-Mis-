<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Mail\OrderExpired;
use Illuminate\Support\Facades\Mail;

class SendEmailForExpiredOrders extends Command
{
    protected $signature = 'orders:send-expired-email';
    protected $description = 'Send email to customers whose orders are expired';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $expiredOrders = Order::where('status', '30_DAYS_EXPIRED')
            ->where('created_at', '<', now()->subDays(30))
            ->get();

        foreach ($expiredOrders as $order) {
            Mail::to($order->customer->email)->send(new OrderExpired($order));
        }

        $this->info('Expired order emails sent successfully!');
    }
}
