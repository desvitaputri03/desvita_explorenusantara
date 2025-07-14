@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-edit me-2"></i>Edit Booking
    </h2>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
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
                <h5 class="mb-0">Informasi Booking</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Destinasi</h6>
                        <p class="mb-3">{{ $booking->destination->name }}</p>
                        
                        <h6 class="text-muted">Wisatawan</h6>
                        <p class="mb-3">{{ $booking->tourist->name }}</p>
                        
                        <h6 class="text-muted">Email</h6>
                        <p class="mb-3">{{ $booking->tourist->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Tanggal Booking</h6>
                        <p class="mb-3">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</p>
                        
                        <h6 class="text-muted">Jumlah Orang</h6>
                        <p class="mb-3">{{ $booking->number_of_people }} orang</p>
                        
                        <h6 class="text-muted">Status Saat Ini</h6>
                        <p class="mb-3">
                            @switch($booking->status)
                                @case('pending')
                                    <span class="badge bg-warning">Pending</span>
                                    @break
                                @case('confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-info">Completed</span>
                                    @break
                            @endswitch
                        </p>
                    </div>
                </div>
                
                @if($booking->special_requests)
                <div class="mt-3">
                    <h6 class="text-muted">Permintaan Khusus</h6>
                    <p class="mb-0">{{ $booking->special_requests }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Status Booking</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan Admin</label>
                        <textarea name="notes" id="notes" class="form-control" rows="3" 
                                  placeholder="Tambahkan catatan untuk wisatawan...">{{ $booking->notes }}</textarea>
                        @error('notes')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Status
                        </button>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 