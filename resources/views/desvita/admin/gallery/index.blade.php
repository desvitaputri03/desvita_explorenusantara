@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Galeri</h1>
    </div>

    <!-- Upload Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Gambar Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Pilih Gambar</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" name="caption" id="caption" class="form-control" value="{{ old('caption') }}">
                            @error('caption')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="destination_id" class="form-label">Destinasi (Opsional)</label>
                    <select name="destination_id" id="destination_id" class="form-select">
                        <option value="">-- Pilih Destinasi --</option>
                        @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                            {{ $destination->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('destination_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-upload me-2"></i>Upload Gambar
                </button>
            </form>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Galeri Gambar</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->caption }}" 
                             class="card-img-top" 
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            @if($gallery->caption)
                            <p class="card-text">{{ $gallery->caption }}</p>
                            @endif
                            @if($gallery->destination)
                            <p class="text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ $gallery->destination->name }}
                            </p>
                            @endif
                            <form action="{{ route('admin.gallery.delete', $gallery) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus gambar ini?')" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-4">
                    <i class="fas fa-images fa-2x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada gambar dalam galeri</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection 