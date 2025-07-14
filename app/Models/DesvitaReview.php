<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesvitaReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourist_id',
        'destination_id',
        'rating',
        'comment',
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