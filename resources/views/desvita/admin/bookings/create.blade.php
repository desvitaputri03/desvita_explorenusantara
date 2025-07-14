@extends('layouts.admin')

@section('title', 'Update Status Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="fas fa-edit me-2"></i>Update Status Booking
    </h2>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="booking_id" class="form-label">ID Booking</label>
                        <input type="text" name="booking_id" id="booking_id" 
                               class="form-control @error('booking_id') is-invalid @enderror" 
                               value="{{ old('booking_id') }}" required>
                        @error('booking_id')
                        <div class="invalid-feedback">ID Booking tidak valid</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pemesanan</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="confirmed">Dikonfirmasi</option>
                            <option value="cancelled">Dibatalkan</option>
                            <option value="completed">Selesai</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">Status harus dipilih</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Admin</label>
                <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" 
                          rows="3" placeholder="Tambahkan catatan jika diperlukan...">{{ old('notes') }}</textarea>
                @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-2">
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
@endsection 