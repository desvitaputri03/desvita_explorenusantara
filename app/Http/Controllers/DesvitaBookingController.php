<?php

namespace App\Http\Controllers;

use App\Models\DesvitaBooking;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;
use Illuminate\Http\Request;

class DesvitaBookingController extends Controller
{
    const STATUS_CONFIRMED = 'confirmed';

    public function index()
    {
        $bookings = DesvitaBooking::with(['tourist', 'destination'])->latest()->paginate(10);
        return view('desvita.admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.bookings.create', compact('destinations', 'tourists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:desvita_bookings,id',
            'status' => 'required|in:confirmed,cancelled,completed',
            'notes' => 'nullable|string|max:1000'
        ], [
            'booking_id.required' => 'ID Booking harus diisi',
            'booking_id.exists' => 'ID Booking tidak ditemukan',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
            'notes.max' => 'Catatan tidak boleh lebih dari 1000 karakter'
        ]);

        try {
            $booking = DesvitaBooking::findOrFail($request->booking_id);
            
            // Update status and notes
            $booking->status = $request->status;
            if ($request->filled('notes')) {
                $booking->notes = $request->notes;
            }
            
            // If status changed to confirmed, clear payment due date
            if ($request->status === 'confirmed') {
                $booking->payment_due_date = null;
            }
            
            $booking->save();

            return redirect()->route('admin.bookings.index')
                ->with('success', 'Status booking berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui status booking')
                ->withInput();
        }
    }

    public function show(DesvitaBooking $booking)
    {
        $booking->load(['tourist', 'destination']);
        return view('desvita.admin.bookings.show', compact('booking'));
    }

    public function edit(DesvitaBooking $booking)
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.bookings.edit', compact('booking', 'destinations', 'tourists'));
    }

    public function update(Request $request, DesvitaBooking $booking)
    {
        $request->validate([
            'tourist_id' => 'required|exists:desvita_tourists,id',
            'destination_id' => 'required|exists:desvita_destinations,id',
            'booking_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string|max:1000'
        ], [
            'booking_date.required' => 'Tanggal kunjungan harus diisi',
            'booking_date.date' => 'Format tanggal tidak valid',
            'number_of_people.required' => 'Jumlah pengunjung harus diisi',
            'number_of_people.integer' => 'Jumlah pengunjung harus berupa angka',
            'number_of_people.min' => 'Jumlah pengunjung minimal 1 orang',
            'total_price.required' => 'Total harga harus diisi',
            'total_price.numeric' => 'Total harga harus berupa angka',
            'total_price.min' => 'Total harga tidak boleh negatif',
            'status.required' => 'Status pemesanan harus dipilih',
            'status.in' => 'Status pemesanan tidak valid',
            'notes.max' => 'Catatan tidak boleh lebih dari 1000 karakter'
        ]);

        try {
            // Update booking data
            $booking->update($request->all());

            // If status changed to confirmed, clear payment due date
            if ($request->status === 'confirmed' && $booking->payment_due_date) {
                $booking->payment_due_date = null;
                $booking->save();
            }

            return redirect()->route('admin.bookings.index')
                ->with('success', 'Data pemesanan berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data pemesanan')
                ->withInput();
        }
    }

    public function destroy(DesvitaBooking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully');
    }

    // Frontend Booking Methods
    public function check()
    {
        return view('desvita.frontend.booking.check');
    }

    public function showFrontend(DesvitaBooking $booking)
    {
        $booking->load(['tourist', 'destination']);
        return view('desvita.frontend.booking.show', compact('booking'));
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'search_type' => 'required|in:email,booking_id',
            'email' => 'required_if:search_type,email|email',
            'booking_id' => 'required_if:search_type,booking_id|numeric'
        ], [
            'search_type.required' => 'Pilih metode pencarian',
            'search_type.in' => 'Metode pencarian tidak valid',
            'email.required_if' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'booking_id.required_if' => 'ID booking harus diisi',
            'booking_id.numeric' => 'ID booking harus berupa angka'
        ]);

        $bookings = collect();

        if ($request->search_type === 'email') {
            // Find tourist by email
            $tourist = DesvitaTourist::where('email', $request->email)->first();

            // Get all bookings for this tourist
            if ($tourist) {
                $bookings = DesvitaBooking::with('destination')
                    ->where('tourist_id', $tourist->id)
                    ->latest()
                    ->get();
            }
        } else {
            // Find booking by ID
            $booking = DesvitaBooking::with('destination')
                ->where('id', $request->booking_id)
                ->first();

            if ($booking) {
                $bookings = collect([$booking]);
            }
        }

        return view('desvita.frontend.booking.check', compact('bookings', 'request'));
    }

    public function createFrontend(DesvitaDestination $destination)
    {
        return view('desvita.frontend.booking.create', compact('destination'));
    }

    public function storeFrontend(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'destination_id' => 'required|exists:desvita_destinations,id',
            'booking_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon harus diisi',
            'booking_date.required' => 'Tanggal kunjungan harus diisi',
            'booking_date.date' => 'Format tanggal tidak valid',
            'booking_date.after' => 'Tanggal kunjungan harus setelah hari ini',
            'number_of_people.required' => 'Jumlah pengunjung harus diisi',
            'number_of_people.integer' => 'Jumlah pengunjung harus berupa angka',
            'number_of_people.min' => 'Jumlah pengunjung minimal 1 orang',
            'notes.max' => 'Catatan tidak boleh lebih dari 1000 karakter'
        ]);

        // Find existing tourist or create new one
        $tourist = DesvitaTourist::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone
            ]
        );

        // If tourist exists but has different details, update them
        if (!$tourist->wasRecentlyCreated) {
            $tourist->update([
                'name' => $request->name,
                'phone' => $request->phone
            ]);
        }

        // Get destination for price calculation
        $destination = DesvitaDestination::findOrFail($request->destination_id);
        $total_price = $destination->price * $request->number_of_people;

        // Create booking
        $booking = DesvitaBooking::create([
            'tourist_id' => $tourist->id,
            'destination_id' => $request->destination_id,
            'booking_date' => $request->booking_date,
            'number_of_people' => $request->number_of_people,
            'total_price' => $total_price,
            'status' => 'pending',
            'notes' => $request->notes,
            'payment_due_date' => now()->addHours(24)
        ]);

        return redirect()->route('booking.show.frontend', $booking)
            ->with('success', 'Booking #' . $booking->id . ' berhasil dibuat! Kami akan segera menghubungi Anda melalui email/telepon untuk konfirmasi.');
    }
} 