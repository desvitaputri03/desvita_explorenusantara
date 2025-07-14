@extends('layouts.admin')

@section('title', 'Detail Wisatawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-user me-2"></i>Detail Wisatawan
    </h2>
    <a href="{{ route('admin.tourists.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Wisatawan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Nama</h6>
                        <p class="mb-3">{{ $tourist->name }}</p>
                        
                        <h6 class="text-muted">Email</h6>
                        <p class="mb-3">{{ $tourist->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Telepon</h6>
                        <p class="mb-3">{{ $tourist->phone }}</p>
                        
                        <h6 class="text-muted">Dibuat Pada</h6>
                        <p class="mb-3">{{ $tourist->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                
                @if($tourist->address)
                <div class="mt-3">
                    <h6 class="text-muted">Alamat</h6>
                    <p class="mb-0">{{ $tourist->address }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Aksi</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.tourists.edit', $tourist) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Wisatawan
                    </a>
                    
                    <form action="{{ route('admin.tourists.destroy', $tourist) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus wisatawan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Hapus Wisatawan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 