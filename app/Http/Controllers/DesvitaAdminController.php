<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;
use App\Models\DesvitaBooking;
use App\Models\DesvitaReview;

class DesvitaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $stats = [
            'destinations' => DesvitaDestination::count(),
            'tourists' => DesvitaTourist::count(),
            'bookings' => DesvitaBooking::count(),
            'reviews' => DesvitaReview::count(),
            'recent_bookings' => DesvitaBooking::with(['tourist', 'destination'])
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get(),
            'recent_reviews' => DesvitaReview::with(['tourist', 'destination'])
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get(),
        ];

        return view('desvita.admin.dashboard', compact('stats'));
    }

    public function editProfile()
    {
        return view('desvita.admin.profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function editPassword()
    {
        return view('desvita.admin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }
} 