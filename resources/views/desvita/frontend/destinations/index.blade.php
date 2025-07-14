<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - MyWisata</title>
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

        .page-header {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .destination-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            height: 100%;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .destination-image {
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .destination-body {
            padding: 1.5rem;
        }

        .destination-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .destination-location {
            color: #6b7280;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .destination-description {
            color: #374151;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color), var(--warning-color));
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 0.5rem;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .destination-card {
                margin-bottom: 1.5rem;
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
        <div class="page-header">
            <h1><i class="fas fa-map-marked-alt me-3"></i>Destinasi Wisata</h1>
            <p>Temukan destinasi wisata terbaik untuk liburan Anda</p>
        </div>

        <div class="row">
            @foreach($destinations as $destination)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-card">
                    <div class="destination-image">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="destination-body">
                        <h5 class="destination-title">{{ $destination->name }}</h5>
                        <p class="destination-location">
                            <i class="fas fa-map-marker-alt me-2"></i>{{ $destination->location }}
                        </p>
                        <p class="destination-description">
                            {{ Str::limit($destination->description, 100) }}
                        </p>
                        <a href="{{ route('frontend.destinations.show', $destination) }}" class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($destinations->isEmpty())
        <div class="text-center text-white">
            <i class="fas fa-search fa-3x mb-3"></i>
            <h3>Belum ada destinasi wisata</h3>
            <p>Destinasi wisata akan ditampilkan di sini</p>
        </div>
        @endif
    </div>

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