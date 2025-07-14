<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .nav-link {
            color: #374151 !important;
            font-weight: 500;
            margin: 0 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
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
        }

        .btn-login-admin:hover {
            background: var(--secondary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.4);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 150px 0 120px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="0,100 1000,0 1000,100"/></svg>');
            background-size: cover;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .hero-section p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .contact-section {
            background: #f8fafc;
            padding: 100px 0;
            position: relative;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="rgba(32, 178, 170, 0.05)"><circle cx="50" cy="50" r="2"/></svg>');
            background-size: 20px 20px;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
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

        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .contact-card:hover {
            background: rgba(255,255,255,0.25);
        }

        .contact-card .icon-wrapper {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 10px 25px rgba(32, 178, 170, 0.3);
        }

        .contact-card h5 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .contact-card p {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .contact-card small {
            color: #6b7280;
            font-size: 0.9rem;
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
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .contact-card {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="/">
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
            <a href="/login" class="btn-login-admin">
                <i class="fas fa-user me-2"></i>
                Login Admin
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="animate-fade-in-up">
                <h1>Hubungi Kami</h1>
                <p>Kami siap membantu Anda merencanakan perjalanan wisata yang tak terlupakan</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5 animate-fade-in-up">
                <h2 class="section-title">Informasi Kontak</h2>
                <p class="lead text-muted">Hubungi kami untuk informasi lebih lanjut tentang destinasi wisata kami</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-4 mb-4 animate-fade-in-up animate-delay-1">
                    <div class="contact-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5>Telepon</h5>
                        <p>+62 823-8647-1756</p>
                        <small>Senin - Jumat, 08:00 - 17:00</small>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 animate-fade-in-up animate-delay-2">
                    <div class="contact-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5>Email</h5>
                        <p>desvitaputri65@gmail.com</p>
                        <small>Respon dalam 24 jam</small>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 animate-fade-in-up animate-delay-3">
                    <div class="contact-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>Alamat</h5>
                        <p>Bukik Barisan, Lima Puluh Kota</p>
                        <small>Sumatera Barat, Indonesia</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer tetap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 