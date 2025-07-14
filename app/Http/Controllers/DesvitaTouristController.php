<?php

namespace App\Http\Controllers;

use App\Models\DesvitaTourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesvitaTouristController extends Controller
{
    public function index()
    {
        $tourists = DesvitaTourist::latest()->paginate(10);
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
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter',
            'address.max' => 'Alamat tidak boleh lebih dari 1000 karakter'
        ]);

        DesvitaTourist::create($request->all());

        return redirect()->route('admin.tourists.index')
            ->with('success', 'Data wisatawan berhasil ditambahkan');
    }

    public function show(DesvitaTourist $tourist)
    {
        $tourist->load('bookings.destination');
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
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:1000'
        ], [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter',
            'address.max' => 'Alamat tidak boleh lebih dari 1000 karakter'
        ]);

        $tourist->update($request->all());

        return redirect()->route('admin.tourists.index')
            ->with('success', 'Data wisatawan berhasil diperbarui');
    }

    public function destroy(DesvitaTourist $tourist)
    {
        $tourist->delete();
        return redirect()->route('admin.tourists.index')
            ->with('success', 'Data wisatawan berhasil dihapus');
    }
} 