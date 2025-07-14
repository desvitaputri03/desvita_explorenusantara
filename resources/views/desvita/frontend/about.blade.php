<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .about-header {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .about-header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .about-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .about-body {
            padding: 3rem 2rem;
        }

        .feature-item {
            text-align: center;
            margin-bottom: 2rem;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--secondary-color), var(--warning-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .feature-description {
            color: #6b7280;
            line-height: 1.6;
        }

        .mission-vision {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
        }

        .mission-vision h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .mission-vision p {
            color: #374151;
            line-height: 1.6;
        }

        .stats-section {
            background: linear-gradient(135deg, var(--success-color), var(--accent-color));
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin: 2rem 0;
        }

        .stat-item {
            text-align: center;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .about-header h1 {
                font-size: 2rem;
            }
            
            .about-body {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light fixed-top" style="background: rgba(255,255,255,0.95); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
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
            <a href="/login" class="btn btn-primary rounded-pill ms-3" style="padding: 8px 24px; font-weight: 600; background: var(--primary-color); border: none;">
                <i class="fas fa-user me-2"></i>
                Login Admin
            </a>
        </div>
    </nav>

    <div class="container main-content">
        <div class="about-card">
            <div class="about-header">
                <h1><i class="fas fa-info-circle me-3"></i>Tentang MyWisata</h1>
                <p>Platform wisata terpercaya untuk menemukan destinasi liburan terbaik</p>
            </div>

            <div class="about-body">
                <div class="mission-vision">
                    <h3><i class="fas fa-bullseye me-2"></i>Misi Kami</h3>
                    <p>Memberikan pengalaman wisata yang terbaik dengan menghubungkan wisatawan dengan destinasi wisata berkualitas tinggi. Kami berkomitmen untuk menyediakan layanan booking yang mudah, aman, dan terpercaya.</p>
                    
                    <h3 class="mt-4"><i class="fas fa-eye me-2"></i>Visi Kami</h3>
                    <p>Menjadi platform wisata terdepan yang memudahkan setiap orang menemukan dan menikmati destinasi wisata terbaik di Indonesia dan dunia.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h4 class="feature-title">Destinasi Terbaik</h4>
                            <p class="feature-description">Kami menyediakan berbagai destinasi wisata pilihan yang telah dikurasi dengan teliti untuk memastikan pengalaman liburan yang memuaskan.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4 class="feature-title">Booking Aman</h4>
                            <p class="feature-description">Sistem booking yang aman dan terpercaya dengan konfirmasi cepat dan pembayaran yang mudah.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <h4 class="feature-title">Layanan 24/7</h4>
                            <p class="feature-description">Tim customer service kami siap membantu Anda kapan saja untuk memastikan pengalaman wisata yang lancar.</p>
                        </div>
                    </div>
                </div>

                <div class="stats-section">
                    <h3 class="text-center mb-4"><i class="fas fa-chart-line me-2"></i>Pencapaian Kami</h3>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="stat-number">100+</div>
                                <div class="stat-label">Destinasi Wisata</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="stat-number">10K+</div>
                                <div class="stat-label">Wisatawan Puas</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Kota Tujuan</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="stat-number">5+</div>
                                <div class="stat-label">Tahun Pengalaman</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('destinations.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-map me-2"></i>Jelajahi Destinasi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 