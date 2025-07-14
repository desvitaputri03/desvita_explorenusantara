<?php

namespace App\Http\Controllers;

use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;
use App\Models\DesvitaBooking;
use App\Models\DesvitaReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DesvitaAdminController extends Controller
{
    public function index()
    {
        $stats = [
            'destinations' => DesvitaDestination::count(),
            'tourists' => DesvitaTourist::count(),
            'bookings' => DesvitaBooking::count(),
            'reviews' => DesvitaReview::count(),
            'pending_bookings' => DesvitaBooking::where('status', 'pending')->count(),
            'confirmed_bookings' => DesvitaBooking::where('status', 'confirmed')->count(),
            'avg_rating' => DesvitaReview::avg('rating') ?? 0
        ];

        $recent_bookings = DesvitaBooking::with(['destination', 'tourist'])
            ->latest()
            ->take(5)
            ->get();

        $recent_reviews = DesvitaReview::with(['destination', 'tourist'])
            ->latest()
            ->take(5)
            ->get();

        return view('desvita.admin.dashboard', compact('stats', 'recent_bookings', 'recent_reviews'));
    }

    // Edit Profil Admin
    public function editProfile()
    {
        $admin = Auth::user();
        return view('desvita.admin.profile.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();
        if ($request->has('update_password')) {
            // Proses ubah password
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ]);
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Password lama salah.'])->withInput();
            }
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.profile.edit')->with('success_password', 'Password berhasil diubah!');
        } else {
            // Proses update profil
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $admin->id,
            ]);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->save();
            return redirect()->route('admin.profile.edit')->with('success_profile', 'Profil berhasil diperbarui!');
        }
    }

    // Ubah Password Admin
    public function editPassword()
    {
        return view('desvita.admin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.settings.edit')->with('success', 'Password berhasil diubah!');
    }
}
