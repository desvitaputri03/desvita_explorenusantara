<?php

namespace App\Http\Controllers;

use App\Models\DesvitaGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DesvitaGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $galleries = DesvitaGallery::orderBy('order')->get();
        return view('desvita.admin.gallery.index', compact('galleries'));
    }

    public function uploadGallery(Request $request)
    {
        try {
            // Pastikan hanya admin yang bisa upload
            if (auth()->user()->role !== 'admin') {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk upload foto.');
            }

            $request->validate([
                'gallery_images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            ]);

            $uploadedImages = [];

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('gallery', $filename, 'public');

                    $gallery = DesvitaGallery::create([
                        'image_path' => $path,
                        'caption' => $image->getClientOriginalName(),
                        'order' => DesvitaGallery::count() + 1
                    ]);

                    $uploadedImages[] = $gallery;
                }
            }

            return redirect()->back()->with('success', count($uploadedImages) . ' foto berhasil diupload!');
        } catch (\Exception $e) {
            Log::error('Upload gallery error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat upload: ' . $e->getMessage());
        }
    }

    public function deleteGallery(DesvitaGallery $gallery)
    {
        try {
            // Pastikan hanya admin yang bisa hapus
            if (auth()->user()->role !== 'admin') {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus foto.');
            }

            // Hapus file dari storage
            if (Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $gallery->delete();

            return redirect()->back()->with('success', 'Foto berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Delete gallery error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus foto: ' . $e->getMessage());
        }
    }

    public function reorderGallery(Request $request)
    {
        try {
            // Pastikan hanya admin yang bisa reorder
            if (auth()->user()->role !== 'admin') {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $request->validate([
                'gallery_ids' => 'required|array',
                'gallery_ids.*' => 'exists:desvita_galleries,id'
            ]);

            foreach ($request->gallery_ids as $index => $id) {
                DesvitaGallery::where('id', $id)->update(['order' => $index + 1]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Reorder gallery error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat reorder'], 500);
        }
    }
}
