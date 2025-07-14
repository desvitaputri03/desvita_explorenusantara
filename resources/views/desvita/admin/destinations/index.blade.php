@extends('layouts.admin')

@section('title', 'Kelola Destinasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Destinasi</h2>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary btn-custom">
        <i class="fas fa-plus me-2"></i>Tambah Destinasi
    </a>
</div>

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
                                <img src="{{ asset('storage/' . $destination->image) }}" 
                                     alt="{{ $destination->name }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px; border-radius: 5px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $destination->name }}</td>
                        <td>{{ $destination->location }}</td>
                        <td>{{ Str::limit($destination->description, 50) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.destinations.edit', $destination) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.destinations.destroy', $destination) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')" 
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-mountain fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada data destinasi</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 