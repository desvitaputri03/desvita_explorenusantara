<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - {{ config('app.website_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            min-height: 100vh;
        }

        .navbar {
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #374151 !important;
            font-weight: 500;
            margin: 0 8px;
            transition: all 0.3s ease;
            position: relative;
            border-radius: 25px;
            padding: 8px 16px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(32, 178, 170, 0.1);
            transform: translateY(-1px);
        }

        .main-content {
            padding: 8rem 0 4rem;
        }

        .page-header {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
            position: relative;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
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
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .destination-image {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .destination-card:hover .destination-image img {
            transform: scale(1.1);
        }

        .destination-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            display: flex;
            align-items: center;
        }

        .destination-location i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .destination-description {
            color: #374151;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .destination-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .destination-price {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .btn-detail {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-detail:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .footer {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 2rem 0;
            margin-top: 4rem;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: white;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            
            .destination-card {
                margin-bottom: 1.5rem;
            }

            .main-content {
                padding: 6rem 0 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="/">
                <i class="fas fa-mountain me-2"></i>
                {{ config('app.website_name') }}
            </a>
            <div class="d-flex align-items-center">
                <a class="nav-link{{ request()->is('/') ? ' active-nav' : '' }}" href="/">
                    <i class="fas fa-home me-1"></i>
                    Beranda
                </a>
                <a href="/login" class="btn btn-primary ms-3" style="padding: 8px 24px; font-weight: 600;">
                    <i class="fas fa-user me-2"></i>
                    Login Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <div class="page-header">
            <h1><i class="fas fa-map-marked-alt me-3"></i>Destinasi Wisata</h1>
            <p>Temukan destinasi wisata terbaik untuk liburan Anda</p>
        </div>

        <div class="row">
            @forelse($destinations as $destination)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-card">
                    <div class="destination-image">
                        @if($destination->image)
                            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" 
                                 class="img-fluid">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                <i class="fas fa-mountain fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="destination-body">
                        <h5 class="destination-title">{{ $destination->name }}</h5>
                        <p class="destination-location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $destination->location ?? 'Lokasi tidak tersedia' }}
                        </p>
                        <p class="destination-description">
                            {{ Str::limit($destination->description, 100) }}
                        </p>
                        <div class="destination-footer">
                            <span class="destination-price">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </span>
                            <a href="{{ route('destinations.show', $destination->id) }}" class="btn-detail">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="py-5">
                    <i class="fas fa-search fa-3x mb-3 text-white"></i>
                    <h3 class="text-white">Belum ada destinasi wisata</h3>
                    <p class="text-white-50">Destinasi wisata akan ditampilkan di sini setelah ditambahkan</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($destinations->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $destinations->links() }}
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0">
                        <i class="fas fa-mountain me-2"></i>
                        {{ config('app.website_name') }}
                    </h5>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">© {{ date('Y') }} {{ config('app.website_name') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 