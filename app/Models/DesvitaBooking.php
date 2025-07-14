<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesvitaBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'tourist_id',
        'booking_date',
        'number_of_people',
        'special_requests',
        'status',
    ];

    public function destination()
    {
        return $this->belongsTo(DesvitaDestination::class, 'destination_id');
    }

    public function tourist()
    {
        return $this->belongsTo(DesvitaTourist::class, 'tourist_id');
    }
}
