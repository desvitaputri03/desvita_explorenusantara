<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesvitaGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'image',
        'caption',
        'order',
    ];

    public function destination()
    {
        return $this->belongsTo(DesvitaDestination::class);
    }
} 