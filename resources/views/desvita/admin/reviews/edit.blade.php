@extends('layouts.admin')

@section('title', 'Edit Review')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-edit me-2"></i>Edit Review
    </h2>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tourist_id" class="form-label">Wisatawan</label>
                        <select name="tourist_id" id="tourist_id" class="form-select" required>
                            <option value="">-- Pilih Wisatawan --</option>
                            @foreach($tourists as $tourist)
                            <option value="{{ $tourist->id }}" {{ old('tourist_id', $review->tourist_id) == $tourist->id ? 'selected' : '' }}>
                                {{ $tourist->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('tourist_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="destination_id" class="form-label">Destinasi</label>
                        <select name="destination_id" id="destination_id" class="form-select" required>
                            <option value="">-- Pilih Destinasi --</option>
                            @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ old('destination_id', $review->destination_id) == $destination->id ? 'selected' : '' }}>
                                {{ $destination->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('destination_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">-- Pilih Rating --</option>
                    @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                        {{ $i }} Bintang
                    </option>
                    @endfor
                </select>
                @error('rating')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="comment" class="form-label">Komentar</label>
                <textarea name="comment" id="comment" class="form-control" rows="4" required>{{ old('comment', $review->comment) }}</textarea>
                @error('comment')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 