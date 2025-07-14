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

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Booking</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Hidden fields for validation -->
                    <input type="hidden" name="tourist_id" value="{{ $booking->tourist_id }}">
                    <input type="hidden" name="destination_id" value="{{ $booking->destination_id }}">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Destinasi</label>
                                <p class="form-control-static">{{ $booking->destination->name }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Wisatawan</label>
                                <p class="form-control-static">{{ $booking->tourist->name }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <p class="form-control-static">{{ $booking->tourist->email }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="booking_date" class="form-label">Tanggal Booking</label>
                                <input type="date" name="booking_date" id="booking_date" 
                                       class="form-control @error('booking_date') is-invalid @enderror"
                                       value="{{ old('booking_date', $booking->booking_date) }}" required>
                                @error('booking_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="number_of_people" class="form-label">Jumlah Orang</label>
                                <input type="number" name="number_of_people" id="number_of_people" 
                                       class="form-control @error('number_of_people') is-invalid @enderror"
                                       value="{{ old('number_of_people', $booking->number_of_people) }}" 
                                       min="1" required>
                                @error('number_of_people')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Harga</label>
                                <input type="number" name="total_price" id="total_price" 
                                       class="form-control @error('total_price') is-invalid @enderror"
                                       value="{{ old('total_price', $booking->total_price) }}" 
                                       min="0" required>
                                @error('total_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Booking</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan</label>
                        <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" 
                                  rows="3">{{ old('notes', $booking->notes) }}</textarea>
                        @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
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