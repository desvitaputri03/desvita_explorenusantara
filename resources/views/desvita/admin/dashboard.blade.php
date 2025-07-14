@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Welcome Section dengan animasi -->
<div class="welcome-card mb-4">
    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-white p-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="mb-2 fw-bold">
                        <i class="fas fa-sun me-2"></i>
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h4>
                    <p class="mb-0 opacity-75">Kelola destinasi wisata dan pantau aktivitas pengunjung dari dashboard ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards dengan hover effects -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100 stats-card" style="transition: all 0.3s ease;">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="stats-icon bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-mountain fa-2x text-primary"></i>
                    </div>
                </div>
                <h2 class="mb-2 fw-bold text-primary">{{ $stats['destinations'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Total Destinasi</p>
                <small class="text-success">
                    <i class="fas fa-arrow-up me-1"></i>
                    Aktif
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100 stats-card" style="transition: all 0.3s ease;">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="stats-icon bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
                <h2 class="mb-2 fw-bold text-info">{{ $stats['tourists'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Total Wisatawan</p>
                <small class="text-info">
                    <i class="fas fa-user-plus me-1"></i>
                    Terdaftar
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100 stats-card" style="transition: all 0.3s ease;">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="stats-icon bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-calendar-check fa-2x text-success"></i>
                    </div>
                </div>
                <h2 class="mb-2 fw-bold text-success">{{ $stats['bookings'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Total Booking</p>
                <small class="text-success">
                    <i class="fas fa-chart-line me-1"></i>
                    {{ $stats['pending_bookings'] }} Pending
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card border-0 shadow-sm h-100 stats-card" style="transition: all 0.3s ease;">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <div class="stats-icon bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-star fa-2x text-warning"></i>
                    </div>
                </div>
                <h2 class="mb-2 fw-bold text-warning">{{ $stats['reviews'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Total Review</p>
                <small class="text-warning">
                    <i class="fas fa-star-half-alt me-1"></i>
                    {{ number_format($stats['avg_rating'], 1) }} Rating
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats dengan gradient -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <i class="fas fa-clock fa-3x text-warning"></i>
                </div>
                <h2 class="mb-2 fw-bold text-warning">{{ $stats['pending_bookings'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Booking Pending</p>
                <small class="text-warning">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    Perlu Konfirmasi
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <i class="fas fa-check-circle fa-3x text-success"></i>
                </div>
                <h2 class="mb-2 fw-bold text-success">{{ $stats['confirmed_bookings'] }}</h2>
                <p class="text-muted mb-0 fw-medium">Booking Dikonfirmasi</p>
                <small class="text-success">
                    <i class="fas fa-thumbs-up me-1"></i>
                    Sudah Diverifikasi
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
            <div class="card-body text-center p-4">
                <div class="mb-3">
                    <i class="fas fa-star-half-alt fa-3x text-info"></i>
                </div>
                <h2 class="mb-2 fw-bold text-info">{{ number_format($stats['avg_rating'], 1) }}</h2>
                <p class="text-muted mb-0 fw-medium">Rating Rata-rata</p>
                <small class="text-info">
                    <i class="fas fa-chart-bar me-1"></i>
                    Dari {{ $stats['reviews'] }} Review
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities dengan improved design -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center p-4">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-calendar me-2 text-primary"></i>
                    Booking Terbaru
                </h5>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body p-0">
                @if($recent_bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0 px-4 py-3">Wisatawan</th>
                                <th class="border-0 px-4 py-3">Destinasi</th>
                                <th class="border-0 px-4 py-3">Tanggal</th>
                                <th class="border-0 px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_bookings as $booking)
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas fa-user text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $booking->tourist->name }}</div>
                                            <small class="text-muted">{{ $booking->tourist->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="fw-medium">{{ $booking->destination->name }}</div>
                                    <small class="text-muted">{{ $booking->destination->location }}</small>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</div>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($booking->booking_date)->format('H:i') }}</small>
                                </td>
                                <td class="px-4 py-3">
                                    @switch($booking->status)
                                        @case('pending')
                                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">
                                                <i class="fas fa-clock me-1"></i>Pending
                                            </span>
                                            @break
                                        @case('confirmed')
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                                <i class="fas fa-check me-1"></i>Confirmed
                                            </span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                                <i class="fas fa-times me-1"></i>Cancelled
                                            </span>
                                            @break
                                        @case('completed')
                                            <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill">
                                                <i class="fas fa-check-double me-1"></i>Completed
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-0">Belum ada booking</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<style>
        .stats-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .stats-icon {
            width: 80px;
            height: 80px;
            background: rgba(32, 178, 170, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
        }
</style> 