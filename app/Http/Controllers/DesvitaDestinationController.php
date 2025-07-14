<?php

namespace App\Http\Controllers;

use App\Models\DesvitaDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesvitaDestinationController extends Controller
{
    public function index()
    {
        $destinations = DesvitaDestination::latest()->paginate(10);
        return view('desvita.admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('desvita.admin.destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $imagePath = $image->store('destinations', 'public');

        DesvitaDestination::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully');
    }

    public function edit(DesvitaDestination $destination)
    {
        return view('desvita.admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, DesvitaDestination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }
            
            // Store new image
            $image = $request->file('image');
            $data['image'] = $image->store('destinations', 'public');
        }

        $destination->update($data);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully');
    }

    public function destroy(DesvitaDestination $destination)
    {
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }
        
        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully');
    }
} 