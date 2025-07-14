<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil - {{ config('app.website_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #20b2aa;
            --secondary-color: #48cae4;
            --success-color: #06b6d4;
            --warning-color: #f59e0b;
            --info-color: #0891b2;
            --danger-color: #ef4444;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            padding-top: 80px;
        }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color);
        }

        .booking-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .booking-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .booking-header h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .booking-body {
            padding: 2rem;
        }

        .info-section {
            background: #f8fafc;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-section h3 {
            color: var(--dark-color);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .info-row {
            display: flex;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-label {
            font-weight: 600;
            color: #64748b;
            width: 200px;
        }

        .info-value {
            flex: 1;
            color: #1e293b;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.875rem;
            background: #fef3c7;
            color: #92400e;
        }

        .action-buttons {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .btn-custom {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 9999px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .alert-custom {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: none;
        }

        .alert-custom .alert-link {
            font-weight: 600;
            text-decoration: none;
        }

        .alert-custom .alert-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-mountain me-2"></i>{{ config('app.website_name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('destinations.index') }}">
                            <i class="fas fa-map-marker-alt me-1"></i>Destinasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success alert-custom">
                    {{ session('success') }}
                </div>
                @endif

                <div class="booking-card">
                    <div class="booking-header">
                        <h1><i class="fas fa-check-circle me-2"></i>Booking Berhasil!</h1>
                        <p class="mb-0">Detail booking Anda telah disimpan dan sedang menunggu konfirmasi</p>
                    </div>

                    <div class="booking-body">
                        <!-- Destination Info -->
                        <div class="info-section">
                            <h3><i class="fas fa-map-marker-alt me-2"></i>Informasi Destinasi</h3>
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
                        <div class="info-section">
                            <h3><i class="fas fa-calendar-check me-2"></i>Detail Booking</h3>
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
                                <span class="info-label">Total Harga:</span>
                                <span class="info-value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Catatan:</span>
                                <span class="info-value">{{ $booking->notes ?? 'Tidak ada' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Status:</span>
                                <span class="status-badge">
                                    <i class="fas fa-clock me-1"></i>Menunggu Konfirmasi
                                </span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal Dibuat:</span>
                                <span class="info-value">{{ $booking->created_at->setTimezone('Asia/Jakarta')->format('d F Y H:i') }}</span>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <div class="alert alert-info alert-custom">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Informasi:</strong> Kami akan menghubungi Anda melalui email atau telepon untuk konfirmasi booking dan informasi pembayaran.
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-custom">
                                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                                </a>
                                <a href="{{ route('destinations.index') }}" class="btn btn-outline-primary btn-custom">
                                    <i class="fas fa-map-marker-alt me-2"></i>Lihat Destinasi Lain
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 