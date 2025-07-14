<?php

namespace App\Http\Controllers;

use App\Models\DesvitaTourist;
use Illuminate\Http\Request;

class DesvitaTouristController extends Controller
{
    public function index()
    {
        $tourists = DesvitaTourist::all();
        return view('desvita.admin.tourists.index', compact('tourists'));
    }

    public function create()
    {
        return view('desvita.admin.tourists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:desvita_tourists,email',
            'phone' => 'required|string|max:20'
        ]);

        DesvitaTourist::create($request->all());

        return redirect()->route('admin.tourists.index')
            ->with('success', 'Wisatawan berhasil ditambahkan!');
    }

    public function show(DesvitaTourist $tourist)
    {
        return view('desvita.admin.tourists.show', compact('tourist'));
    }

    public function edit(DesvitaTourist $tourist)
    {
        return view('desvita.admin.tourists.edit', compact('tourist'));
    }

    public function update(Request $request, DesvitaTourist $tourist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:desvita_tourists,email,' . $tourist->id,
            'phone' => 'required|string|max:20'
        ]);

        $tourist->update($request->all());

        return redirect()->route('admin.tourists.index')
            ->with('success', 'Wisatawan berhasil diperbarui!');
    }

    public function destroy(DesvitaTourist $tourist)
    {
        $tourist->delete();

        return redirect()->route('admin.tourists.index')
            ->with('success', 'Wisatawan berhasil dihapus!');
    }
}
