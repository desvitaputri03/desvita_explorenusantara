@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </h2>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <!-- Destinations Stats -->
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

        <!-- Tourists Stats -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100 stats-card">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="stats-icon bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-users fa-2x text-success"></i>
                        </div>
                    </div>
                    <h2 class="mb-2 fw-bold text-success">{{ $stats['tourists'] }}</h2>
                    <p class="text-muted mb-0 fw-medium">Total Wisatawan</p>
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        Terdaftar
                    </small>
                </div>
            </div>
        </div>

        <!-- Bookings Stats -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100 stats-card">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="stats-icon bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-calendar-check fa-2x text-info"></i>
                        </div>
                    </div>
                    <h2 class="mb-2 fw-bold text-info">{{ $stats['bookings'] }}</h2>
                    <p class="text-muted mb-0 fw-medium">Total Pemesanan</p>
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        Aktif
                    </small>
                </div>
            </div>
        </div>

        <!-- Reviews Stats -->
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm h-100 stats-card">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <div class="stats-icon bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-star fa-2x text-warning"></i>
                        </div>
                    </div>
                    <h2 class="mb-2 fw-bold text-warning">{{ $stats['reviews'] }}</h2>
                    <p class="text-muted mb-0 fw-medium">Total Ulasan</p>
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        Terkumpul
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row mt-4">
        <!-- Recent Bookings -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-calendar-alt me-2 text-info"></i>Pemesanan Terbaru
                        </h5>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-info">
                            Lihat Semua
                        </a>
                    </div>
                    
                    @if($stats['recent_bookings']->count() > 0)
                        <div class="list-group">
                            @foreach($stats['recent_bookings'] as $booking)
                                <div class="list-group-item border-0 mb-3 bg-light rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $booking->tourist->name }}</h6>
                                            <p class="mb-1 text-muted small">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                {{ $booking->destination->name }}
                                            </p>
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $booking->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-info">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-3">Belum ada pemesanan</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star me-2 text-warning"></i>Ulasan Terbaru
                        </h5>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-outline-warning">
                            Lihat Semua
                        </a>
                    </div>
                    
                    @if($stats['recent_reviews']->count() > 0)
                        <div class="list-group">
                            @foreach($stats['recent_reviews'] as $review)
                                <div class="list-group-item border-0 mb-3 bg-light rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $review->tourist->name }}</h6>
                                            <p class="mb-1">
                                                @for($i = 0; $i < 5; $i++)
                                                    @if($i < $review->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-warning"></i>
                                                    @endif
                                                @endfor
                                            </p>
                                            <p class="mb-1 text-muted small">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                {{ $review->destination->name }}
                                            </p>
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $review->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-warning">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-3">Belum ada ulasan</p>
                    @endif
                </div>
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
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
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
        transition: all 0.3s ease;
    }

    .stats-card:hover .stats-icon {
        transform: scale(1.1);
    }

    .btn-custom {
        border-radius: 10px;
        padding: 12px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
    }

    .list-group-item {
        transition: all 0.3s ease;
    }

    .list-group-item:hover {
        transform: translateX(5px);
        background-color: #f8f9fa !important;
    }
</style> 