@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-edit me-2"></i>Edit Destinasi
    </h2>
    <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Destinasi</label>
                        <input type="text" name="name" id="name" class="form-control" 
                               value="{{ old('name', $destination->name) }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" name="location" id="location" class="form-control" 
                               value="{{ old('location', $destination->location) }}" required>
                        @error('location')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $destination->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if($destination->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $destination->image) }}" 
                         alt="{{ $destination->name }}" 
                         style="max-width: 200px; border-radius: 8px;">
                </div>
                @endif
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 