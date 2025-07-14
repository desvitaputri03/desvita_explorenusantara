@extends('layouts.admin')

@section('title', 'Detail Booking')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-calendar-check me-2"></i>Detail Booking
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
                            
                            <h6 class="text-muted">Status</h6>
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
                            
                            <h6 class="text-muted">Dibuat Pada</h6>
                            <p class="mb-3">{{ $booking->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    
                    @if($booking->notes)
                    <div class="mt-3">
                        <h6 class="text-muted">Catatan</h6>
                        <p class="mb-0">{{ $booking->notes }}</p>
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
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Booking
                        </a>
                        
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Hapus Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 