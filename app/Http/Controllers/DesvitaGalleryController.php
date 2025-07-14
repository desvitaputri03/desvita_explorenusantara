<?php

namespace App\Http\Controllers;

use App\Models\DesvitaGallery;
use App\Models\DesvitaDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesvitaGalleryController extends Controller
{
    public function index()
    {
        $galleries = DesvitaGallery::with('destination')->orderBy('order')->get();
        $destinations = DesvitaDestination::orderBy('name')->get();
        return view('desvita.admin.gallery.index', compact('galleries', 'destinations'));
    }

    public function uploadGallery(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'nullable|string|max:255',
            'destination_id' => 'nullable|exists:desvita_destinations,id',
        ]);

        $image = $request->file('image');
        $imagePath = $image->store('gallery', 'public');

        $lastOrder = DesvitaGallery::max('order') ?? 0;

        DesvitaGallery::create([
            'image' => $imagePath,
            'caption' => $request->caption,
            'destination_id' => $request->destination_id,
            'order' => $lastOrder + 1,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gambar berhasil diupload');
    }

    public function deleteGallery(DesvitaGallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gambar berhasil dihapus');
    }

    public function reorderGallery(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:desvita_galleries,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            DesvitaGallery::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['message' => 'Urutan galeri berhasil diperbarui']);
    }
} 