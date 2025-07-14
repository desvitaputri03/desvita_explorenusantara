<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesvitaBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourist_id',
        'destination_id',
        'booking_date',
        'number_of_people',
        'total_price',
        'status',
        'notes',
        'payment_due_date'
    ];

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    public function tourist()
    {
        return $this->belongsTo(DesvitaTourist::class, 'tourist_id');
    }

    public function destination()
    {
        return $this->belongsTo(DesvitaDestination::class, 'destination_id');
    }
} 