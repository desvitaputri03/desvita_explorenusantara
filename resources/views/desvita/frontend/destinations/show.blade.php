<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #20b2aa;
            --secondary-color: #48cae4;
            --accent-color: #06b6d4;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
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

        .nav-link {
            color: #374151 !important;
            font-weight: 500;
            margin: 0 8px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 120px 0 80px;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background: var(--accent-color);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .info-item strong {
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .info-item p {
            color: #6b7280;
            margin-bottom: 0;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .feature-item {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            border: none;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .feature-item h5 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .feature-item p {
            color: #6b7280;
            margin-bottom: 0;
        }

        .gallery-section {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            padding: 80px 0;
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-card {
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            padding: 3rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .footer {
            background: #1f2937;
            color: white;
            padding: 40px 0 20px;
        }

        .nav-link.active-nav {
            background: var(--primary-color);
            color: #fff !important;
            border-radius: 999px;
            padding: 4px 14px;
            font-weight: 600;
            font-size: 1rem;
        }
        .nav-link {
            border-radius: 999px;
            padding: 4px 14px;
            font-size: 1rem;
        }
        .btn-login-admin {
            padding: 4px 18px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 999px;
            background: var(--primary-color);
            border: none;
            color: #fff;
        }
        .btn-login-admin:hover {
            background: var(--secondary-color);
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-mountain me-2"></i>
                MyWisata
            </a>
            <ul class="nav d-flex flex-row align-items-center" style="gap: 1.5rem; margin-bottom: 0;">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active-nav' : '' }}" href="/">
                        <i class="fas fa-home me-1"></i>
                        Beranda
                    </a>
                </li>
            </ul>
            <a href="/login" class="btn-login-admin ms-3">
                <i class="fas fa-user me-2"></i>
                Login Admin
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1>{{ $destination->name }}</h1>
                        <p>{{ $destination->description }}</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#info" class="btn btn-light btn-custom">Informasi Detail</a>
                            @if($destination->galleries->count() > 0)
                            <a href="#gallery" class="btn btn-outline-light btn-custom">Galeri Foto</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section id="info" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="feature-grid">
                        <div class="feature-item">
                            <h5>Lokasi</h5>
                            <p>{{ $destination->location }}</p>
                        </div>
                        <div class="feature-item">
                            <h5>Rating</h5>
                            <p>4.8/5 (Berdasarkan ulasan pengunjung)</p>
                        </div>
                        @if($bookingStats['total'] > 0)
                        <div class="feature-item">
                            <h5>History Booking</h5>
                            <div class="d-flex flex-column gap-2">
                                <p class="mb-0">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    {{ $bookingStats['completed'] }} booking selesai
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-clock text-warning me-2"></i>
                                    {{ $bookingStats['upcoming'] }} booking akan datang
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-history text-primary me-2"></i>
                                    Total {{ $bookingStats['total'] }} booking
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-card">
                        <h3 class="mb-4 fw-bold">Informasi Destinasi</h3>
                        <div class="info-item">
                            <div>
                                <strong>Nama</strong>
                                <p>{{ $destination->name }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('frontend.booking.create', $destination) }}" class="btn btn-primary btn-custom w-100 mb-2">
                                Booking Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    @if($destination->galleries->count() > 0)
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Galeri Foto</h2>
                <p class="lead">Nikmati keindahan {{ $destination->name }} melalui koleksi foto yang memukau</p>
            </div>
            <div class="row">
                @foreach($destination->galleries->take(6) as $gallery)
                <div class="col-md-4 mb-4">
                    <div class="gallery-item">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->caption ?? 'Galeri ' . $loop->iteration }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">
                        <i class="fas fa-mountain me-2"></i>MyWisata
                    </h5>
                    <p class="text-white-50">Menjadi destinasi wisata terbaik dengan menggabungkan keindahan alam dan budaya lokal.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-white-50 mb-0">
                        <i class="far fa-copyright me-1"></i>2024 MyWisata. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 