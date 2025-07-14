<?php

namespace App\Http\Controllers;

use App\Models\DesvitaBooking;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;
use Illuminate\Http\Request;

class DesvitaBookingController extends Controller
{
    public function index()
    {
        $bookings = DesvitaBooking::with(['destination', 'tourist'])->get();
        return view('desvita.admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.bookings.create', compact('destinations', 'tourists'));
    }

    // Frontend booking create
    public function createFrontend(DesvitaDestination $destination)
    {
        return view('desvita.frontend.booking.create', compact('destination'));
    }

    // Frontend booking store
    public function storeFrontend(Request $request, DesvitaDestination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'booking_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1|max:50',
            'special_requests' => 'nullable|string|max:500'
        ]);

        // Create tourist if not exists
        $tourist = DesvitaTourist::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => 'Not provided'
            ]
        );

        // Create booking
        $booking = DesvitaBooking::create([
            'destination_id' => $destination->id,
            'tourist_id' => $tourist->id,
            'booking_date' => $request->booking_date,
            'number_of_people' => $request->number_of_people,
            'special_requests' => $request->special_requests,
            'status' => 'pending'
        ]);

        return redirect()->route('frontend.booking.show', $booking)
            ->with('success', '🎉 Booking berhasil dibuat! Berikut detail booking Anda.');
    }

    // Frontend booking detail
    public function showFrontend(DesvitaBooking $booking)
    {
        $booking->load(['destination', 'tourist']);
        return view('desvita.frontend.booking.show', compact('booking'));
    }

    // Frontend bookings list
    public function indexFrontend()
    {
        $bookings = DesvitaBooking::with(['destination', 'tourist'])->latest()->get();
        return view('desvita.frontend.booking.index', compact('bookings'));
    }

    // Check booking form
    public function checkBookingForm()
    {
        return view('desvita.frontend.booking.check');
    }

    // Check booking status
    public function checkBooking(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $bookings = DesvitaBooking::with(['destination', 'tourist'])
            ->whereHas('tourist', function($query) use ($request) {
                $query->where('email', $request->email);
            })
            ->latest()
            ->get();

        return view('desvita.frontend.booking.check', compact('bookings', 'request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:desvita_destinations,id',
            'tourist_id' => 'required|exists:desvita_tourists,id',
            'booking_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        DesvitaBooking::create($request->all());

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil ditambahkan!');
    }

    public function show(DesvitaBooking $booking)
    {
        $booking->load(['destination', 'tourist']);
        return view('desvita.admin.bookings.show', compact('booking'));
    }

    public function edit(DesvitaBooking $booking)
    {
        $booking->load(['destination', 'tourist']);
        return view('desvita.admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, DesvitaBooking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string|max:1000'
        ]);

        $booking->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Status booking berhasil diperbarui!');
    }

    public function destroy(DesvitaBooking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus!');
    }
}
