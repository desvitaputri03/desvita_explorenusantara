<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Booking - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #fbbf24;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color)) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .main-content {
            padding: 2rem 0;
        }

        .booking-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .booking-header {
            background: linear-gradient(135deg, var(--success-color), var(--accent-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .booking-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .booking-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .booking-body {
            padding: 2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #374151;
            font-size: 1.1rem;
        }

        .info-value {
            color: #1f2937;
            font-size: 1.1rem;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .status-pending {
            background: linear-gradient(135deg, var(--warning-color), #fbbf24);
            color: white;
        }

        .status-confirmed {
            background: linear-gradient(135deg, var(--success-color), #34d399);
            color: white;
        }

        .status-cancelled {
            background: linear-gradient(135deg, var(--danger-color), #f87171);
            color: white;
        }

        .status-completed {
            background: linear-gradient(135deg, var(--primary-color), #60a5fa);
            color: white;
        }

        .action-buttons {
            padding: 2rem;
            text-align: center;
            background: #f8fafc;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .destination-info {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .destination-info h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .alert-info {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
        }

        @media (max-width: 768px) {
            .booking-header h1 {
                font-size: 2rem;
            }
            
            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .booking-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light fixed-top" style="background: rgba(255,255,255,0.95); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="/">MyWisata</a>
            <ul class="nav d-flex flex-row align-items-center" style="gap: 1rem; margin-bottom: 0;">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active-nav' : '' }}" href="/">Beranda</a>
                </li>
            </ul>
            <a href="/login" class="btn btn-primary rounded-pill ms-3" style="padding: 8px 24px; font-weight: 600; background: var(--primary-color); border: none;">Login Admin</a>
        </div>
    </nav>
    <style>
        .nav-link.active-nav {
            background: var(--primary-color);
            color: #fff !important;
            border-radius: 999px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .nav-link {
            border-radius: 999px;
            padding: 8px 20px;
            transition: all 0.2s;
        }
    </style>

    <div class="container main-content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="booking-card">
                    <div class="booking-header">
                        <h1>Booking Berhasil!</h1>
                        <p>Detail booking Anda telah disimpan dan sedang menunggu konfirmasi</p>
                    </div>

                    <div class="booking-body">
                        <!-- Destination Info -->
                        <div class="destination-info">
                            <h3>Informasi Destinasi</h3>
                            <div class="info-row">
                                <span class="info-label">Nama Destinasi:</span>
                                <span class="info-value">{{ $booking->destination->name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Lokasi:</span>
                                <span class="info-value">{{ $booking->destination->location }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Deskripsi:</span>
                                <span class="info-value">{{ $booking->destination->description }}</span>
                            </div>
                        </div>

                        <!-- Booking Details -->
                        <h3 class="mb-3">Detail Booking</h3>
                        
                        <div class="info-row">
                            <span class="info-label">ID Booking:</span>
                            <span class="info-value">#{{ $booking->id }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Tanggal Booking:</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Jumlah Orang:</span>
                            <span class="info-value">{{ $booking->number_of_people }} orang</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Permintaan Khusus:</span>
                            <span class="info-value">{{ $booking->special_requests ?: 'Tidak ada' }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Status:</span>
                            <span class="status-badge status-{{ $booking->status }}">
                                @switch($booking->status)
                                    @case('pending')
                                        Menunggu Konfirmasi
                                        @break
                                    @case('confirmed')
                                        Dikonfirmasi
                                        @break
                                    @case('cancelled')
                                        Dibatalkan
                                        @break
                                    @case('completed')
                                        Selesai
                                        @break
                                @endswitch
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Tanggal Dibuat:</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($booking->created_at)->format('d F Y H:i') }}</span>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <div class="alert alert-info">
                            <strong>Penting:</strong> Anda dapat memeriksa status booking kapan saja dengan mengunjungi halaman 
                            <a href="{{ route('frontend.booking.check') }}" class="alert-link">Cek Status Booking</a> 
                            dan memasukkan email Anda.
                        </div>

                        <a href="{{ route('frontend.home') }}" class="btn btn-primary">
                            Kembali ke Beranda
                        </a>
                        
                        <a href="{{ route('frontend.destinations') }}" class="btn btn-secondary">
                            Lihat Destinasi Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 