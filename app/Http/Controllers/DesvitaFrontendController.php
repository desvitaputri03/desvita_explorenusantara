<?php

namespace App\Http\Controllers;

use App\Models\DesvitaDestination;
use App\Models\DesvitaBooking;
use Illuminate\Http\Request;

class DesvitaFrontendController extends Controller
{
    public function index()
    {
        $destinations = DesvitaDestination::all();
        return view('desvita.frontend.home', compact('destinations'));
    }

    public function show(DesvitaDestination $destination)
    {
        $destination->load('galleries');
        
        // Get booking history for this destination
        $bookingStats = [
            'total' => DesvitaBooking::where('destination_id', $destination->id)->count(),
            'completed' => DesvitaBooking::where('destination_id', $destination->id)
                ->where('status', 'completed')
                ->count(),
            'upcoming' => DesvitaBooking::where('destination_id', $destination->id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('booking_date', '>=', now())
                ->count()
        ];
        
        return view('desvita.frontend.destinations.show', compact('destination', 'bookingStats'));
    }

    public function destinations()
    {
        $destinations = DesvitaDestination::all();
        return view('desvita.frontend.destinations.index', compact('destinations'));
    }

    public function contact()
    {
        return view('desvita.frontend.contact');
    }
}
