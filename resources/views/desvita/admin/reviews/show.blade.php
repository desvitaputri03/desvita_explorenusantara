@extends('layouts.admin')

@section('title', 'Detail Review')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-star me-2"></i>Detail Review
        </h2>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Review</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted">Wisatawan</h6>
                            <p class="mb-3">{{ $review->tourist->name }}</p>
                            
                            <h6 class="text-muted">Email</h6>
                            <p class="mb-3">{{ $review->tourist->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Destinasi</h6>
                            <p class="mb-3">{{ $review->destination->name }}</p>
                            
                            <h6 class="text-muted">Rating</h6>
                            <p class="mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                                <span class="ms-2">({{ $review->rating }}/5)</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <h6 class="text-muted">Komentar</h6>
                        <p class="mb-0">{{ $review->comment }}</p>
                    </div>
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
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Review
                        </a>
                        
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Hapus Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 