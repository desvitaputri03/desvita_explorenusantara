<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.website_name') }} - Destinasi Wisata Terbaik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #20b2aa;
            --secondary-color: #48cae4;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.8;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            color: var(--accent-color);
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(32, 178, 170, 0.1);
            transform: translateY(-1px);
        }

        .nav-link.active-nav {
            background: var(--primary-color);
            color: #fff !important;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(32, 178, 170, 0.3);
        }

        .nav-link.active-nav:hover {
            background: var(--accent-color);
            transform: translateY(-1px);
        }

        .btn-login-admin {
            padding: 8px 24px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 25px;
            background: var(--primary-color);
            border: none;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(32, 178, 170, 0.3);
            text-decoration: none;
        }

        .btn-login-admin:hover {
            background: var(--secondary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(32, 178, 170, 0.4);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 180px 0 150px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.1"><circle cx="100" cy="100" r="50" fill="white"/></svg>');
            background-size: 100px 100px;
            opacity: 0.1;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            font-weight: 300;
        }

        .btn-custom {
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-custom:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .btn-custom.btn-detail {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            font-size: 0.9rem;
        }

        .btn-custom.btn-detail:hover {
            background: var(--accent-color);
            color: white;
        }

        .section-title {
            font-size: 3.2rem;
            font-weight: 800;
            letter-spacing: -1px;
            text-transform: uppercase;
            margin-bottom: 2rem;
            line-height: 1.2;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .destination-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .destination-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 1.2rem;
        }

        .card-text {
            font-size: 1.1rem;
            line-height: 1.8;
            font-weight: 400;
        }

        .about-section {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            padding: 100px 0;
            position: relative;
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="rgba(32, 178, 170, 0.05)"><circle cx="50" cy="50" r="2"/></svg>');
            background-size: 20px 20px;
        }

        .contact-section {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            color: white;
            padding: 100px 0;
            position: relative;
        }

        .contact-card {
            text-align: center;
            padding: 2.5rem;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .contact-card:hover {
            background: rgba(255,255,255,0.25);
        }

        .contact-card h5 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 1.2rem;
            text-transform: uppercase;
        }

        .contact-card p {
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: -0.2px;
        }

        .footer {
            background: #1f2937;
            color: white;
            padding: 60px 0 30px;
        }

        .feature-list {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
        }

        .feature-list h5 {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 2rem;
        }

        .feature-list li {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1rem;
            letter-spacing: -0.2px;
        }

        .feature-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 120px 0 100px;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section p {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            .card-title {
                font-size: 1.3rem;
            }
            
            .feature-list h5 {
                font-size: 1.5rem;
            }
            
            .feature-list li {
                font-size: 1.1rem;
            }
            .btn-custom {
                padding: 10px 25px;
                font-size: 0.9rem;
            }
        }

        /* Responsive navbar */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem 0;
            }
            
            .nav {
                gap: 0.5rem !important;
            }
            
            .nav-link {
                font-size: 0.9rem;
                padding: 6px 12px;
            }
            
            .btn-login-admin {
                font-size: 0.9rem;
                padding: 6px 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-mountain me-2"></i>{{ config('app.website_name') }}
            </a>
            <ul class="nav d-flex flex-row align-items-center" style="gap: 1.5rem; margin-bottom: 0;">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active-nav' : '' }}" href="/">
                        <i class="fas fa-home me-1"></i>
                        Beranda
                    </a>
                </li>
            </ul>
            <a href="/login" class="btn-login-admin">
                <i class="fas fa-user me-2"></i>
                Login Admin
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-3 fw-bold mb-4 animate-fade-in-up">
                        Selamat Datang<br>di WisataKU
                    </h1>
                    <p class="lead mb-5 animate-fade-in-up animate-delay-1">
                        Menjadi destinasi wisata terbaik dengan<br>menggabungkan keindahan alam dan budaya lokal.
                    </p>
                    <div class="animate-fade-in-up animate-delay-2">
                        <a href="{{ route('destinations.index') }}" class="btn btn-custom px-5 py-3">
                            <i class="fas fa-compass me-2"></i>
                            Jelajahi Destinasi
                        </a>
                    </div>
                </div>
            </div>
            <!-- Decorative Elements -->
            <div class="position-absolute" style="bottom: -20px; left: 0; right: 0; text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="display: block;">
                    <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Destinasi Wisata</h2>
                <p class="text-muted lead">Temukan keindahan alam dan budaya desa wisata kami yang menakjubkan</p>
            </div>
            
            <div class="row">
                @foreach($destinations as $index => $destination)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <h5 class="card-title mb-0">{{ $destination->name }}</h5>
                            </div>
                            <p class="card-text">{{ Str::limit($destination->description, 120) }}</p>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-pin text-muted me-2"></i>
                                <small class="text-muted">{{ $destination->location }}</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning me-1"></i>
                                    <small class="text-muted">4.5 (120 reviews)</small>
                                </div>
                                <a href="{{ route('destinations.show', $destination) }}" class="btn btn-custom btn-detail">
                                    <i class="fas fa-eye me-2"></i>
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section-title text-start">Tentang Desa Wisata</h2>
                    <p class="lead mb-4">Desa wisata kami menawarkan pengalaman wisata yang unik dan autentik dengan menggabungkan keindahan alam, budaya lokal, dan kearifan tradisional yang telah diwariskan turun-temurun.</p>
                    <p class="mb-4">Nikmati pemandangan alam yang indah, kuliner tradisional yang lezat, dan kerajinan tangan dari pengrajin lokal yang handal. Setiap sudut desa menyimpan cerita dan keunikan tersendiri.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-award text-success fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Terpercaya & Terverifikasi</h6>
                            <small class="text-muted">Destinasi wisata terbaik 2024</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-list">
                        <h5>Fitur Unggulan</h5>
                        <ul class="list-unstyled">
                            <li>Alam yang Indah & Terjaga</li>
                            <li>Budaya Lokal yang Autentik</li>
                            <li>Kuliner Tradisional Lezat</li>
                            <li>Kerajinan Tangan Berkualitas</li>
                            <li>Penginapan Nyaman & Bersih</li>
                            <li>Pemandu Wisata Profesional</li>
                        </ul>
                        <div class="mt-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <h4 class="text-primary mb-1">500+</h4>
                                    <small class="text-muted">Wisatawan</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-success mb-1">4.8</h4>
                                    <small class="text-muted">Rating</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-warning mb-1">10+</h4>
                                    <small class="text-muted">Destinasi</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title text-white">Hubungi Kami</h2>
                <p class="lead">Untuk informasi lebih lanjut tentang destinasi wisata kami</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <h5>Telepon</h5>
                        <p class="mb-0 fw-bold">+62 823-8647-1756</p>
                        <small class="opacity-75">Senin - Jumat, 08:00 - 17:00</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="mb-0 fw-bold">desvitaputri65@gmail.com</p>
                        <small class="opacity-75">Respon dalam 24 jam</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </div>
                        <h5>Alamat</h5>
                        <p class="mb-0 fw-bold">Bukik Barisan, Lima Puluh Kota</p>
                        <small class="opacity-75">Sumatera Barat, Indonesia</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">
                        <i class="fas fa-mountain me-2"></i>{{ config('app.website_name') }}
                    </h5>
                    <p class="text-white-50">Menjadi destinasi wisata terbaik dengan menggabungkan keindahan alam dan budaya lokal.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white-50"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-white-50 mb-0">
                        <i class="far fa-copyright me-1"></i>2024 {{ config('app.website_name') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 