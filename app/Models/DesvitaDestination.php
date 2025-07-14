<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesvitaDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'price',
        'image',
    ];

    public function bookings()
    {
        return $this->hasMany(DesvitaBooking::class, 'destination_id');
    }

    public function reviews()
    {
        return $this->hasMany(DesvitaReview::class, 'destination_id');
    }

    public function galleries()
    {
        return $this->hasMany(DesvitaGallery::class, 'destination_id');
    }
} 