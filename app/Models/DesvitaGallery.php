<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesvitaGallery extends Model
{
    use HasFactory;

    protected $table = 'desvita_galleries';
    protected $fillable = [
        'destination_id',
        'image_path',
        'caption',
        'order'
    ];

    public function destination()
    {
        return $this->belongsTo(DesvitaDestination::class, 'destination_id');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
