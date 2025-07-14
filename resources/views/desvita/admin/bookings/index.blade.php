@extends('layouts.admin')

@section('title', 'Kelola Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-2">Kelola Booking</h2>
        <p class="mb-0">Kelola semua booking wisatawan</p>
    </div>
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary btn-custom">
        <i class="fas fa-plus me-2"></i>Tambah Booking
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Destinasi</th>
                        <th>Wisatawan</th>
                        <th>Tanggal Booking</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->destination->name }}</td>
                        <td>{{ $booking->tourist->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</td>
                        <td>
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
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.bookings.show', $booking) }}" 
                                   class="btn btn-info btn-sm btn-custom">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.bookings.edit', $booking) }}" 
                                   class="btn btn-warning btn-sm btn-custom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $booking) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')" 
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
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-calendar fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada data booking</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 