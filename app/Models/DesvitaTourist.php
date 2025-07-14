<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesvitaTourist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function bookings()
    {
        return $this->hasMany(DesvitaBooking::class, 'tourist_id');
    }

    public function reviews()
    {
        return $this->hasMany(DesvitaReview::class, 'tourist_id');
    }
}
