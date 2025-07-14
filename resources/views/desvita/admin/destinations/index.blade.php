@extends('layouts.admin')

@section('title', 'Kelola Destinasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Destinasi</h2>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary btn-custom">
        <i class="fas fa-plus me-2"></i>Tambah Destinasi
    </a>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Destinasi</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $index => $destination)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($destination->image)
                            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 8px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td><strong>{{ $destination->name }}</strong></td>
                        <td>{{ $destination->location }}</td>
                        <td>{{ Str::limit($destination->description, 100) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-warning btn-sm btn-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-custom">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Belum ada destinasi wisata</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 