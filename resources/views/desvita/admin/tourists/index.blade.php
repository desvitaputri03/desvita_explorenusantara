@extends('layouts.admin')

@section('title', 'Kelola Wisatawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-2">Kelola Wisatawan</h2>
        <p class="mb-0">Kelola data wisatawan</p>
    </div>
    <a href="{{ route('admin.tourists.create') }}" class="btn btn-primary btn-custom">
        <i class="fas fa-plus me-2"></i>Tambah Wisatawan
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tourists as $index => $tourist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tourist->name }}</td>
                        <td>{{ $tourist->email }}</td>
                        <td>{{ $tourist->phone }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.tourists.show', $tourist) }}" 
                                   class="btn btn-info btn-sm btn-custom">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.tourists.edit', $tourist) }}" 
                                   class="btn btn-warning btn-sm btn-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.tourists.destroy', $tourist) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus wisatawan ini?')" 
                                      style="display: inline;">
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
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-users fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada data wisatawan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 