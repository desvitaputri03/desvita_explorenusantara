<?php

namespace App\Http\Controllers;

use App\Models\DesvitaReview;
use App\Models\DesvitaDestination;
use App\Models\DesvitaTourist;
use Illuminate\Http\Request;

class DesvitaReviewController extends Controller
{
    public function index()
    {
        $reviews = DesvitaReview::with(['destination', 'tourist'])->get();
        return view('desvita.admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.reviews.create', compact('destinations', 'tourists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:desvita_destinations,id',
            'tourist_id' => 'required|exists:desvita_tourists,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        DesvitaReview::create($request->all());

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review berhasil ditambahkan!');
    }

    public function show(DesvitaReview $review)
    {
        $review->load(['destination', 'tourist']);
        return view('desvita.admin.reviews.show', compact('review'));
    }

    public function edit(DesvitaReview $review)
    {
        $destinations = DesvitaDestination::all();
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.reviews.edit', compact('review', 'destinations', 'tourists'));
    }

    public function update(Request $request, DesvitaReview $review)
    {
        $request->validate([
            'destination_id' => 'required|exists:desvita_destinations,id',
            'tourist_id' => 'required|exists:desvita_tourists,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $review->update($request->all());

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy(DesvitaReview $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review berhasil dihapus!');
    }
}
