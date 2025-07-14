<?php

namespace App\Console\Commands;

use App\Models\DesvitaBooking;
use Illuminate\Console\Command;

class CheckExpiredBookings extends Command
{
    protected $signature = 'bookings:check-expired';
    protected $description = 'Check and update expired bookings';

    public function handle()
    {
        $expiredBookings = DesvitaBooking::where('status', DesvitaBooking::STATUS_PENDING)
            ->whereNotNull('payment_due_date')
            ->where('payment_due_date', '<', now())
            ->get();

        foreach ($expiredBookings as $booking) {
            $booking->markAsExpired();
            $this->info("Booking #{$booking->id} marked as expired.");
        }

        $this->info("Checked " . $expiredBookings->count() . " expired bookings.");
    }
} 