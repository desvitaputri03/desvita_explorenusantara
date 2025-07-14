<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - {{ $destination->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: #f8fafc;
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
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-1px);
        }

        .booking-section {
            padding: 120px 0 80px;
        }

        .booking-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .destination-info {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .destination-info h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .booking-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(32, 178, 170, 0.25);
            transform: translateY(-1px);
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
        }

        .btn-primary:hover {
            background: var(--accent-color);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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

    <!-- Booking Section -->
    <section class="booking-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="booking-card">
                        <!-- Destination Info -->
                        <div class="destination-info">
                            <h3>{{ $destination->name }}</h3>
                            <p class="mb-0">{{ $destination->location }}</p>
                        </div>

                        <!-- Success/Error Messages -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <!-- Booking Form -->
                        <form action="{{ route('frontend.booking.store', $destination) }}" method="POST">
                            @csrf
                            
                            <div class="booking-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                               id="phone" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="booking_date" class="form-label">Tanggal Kunjungan</label>
                                        <input type="date" class="form-control @error('booking_date') is-invalid @enderror" 
                                               id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                                        @error('booking_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="number_of_people" class="form-label">Jumlah Orang</label>
                                        <select class="form-control @error('number_of_people') is-invalid @enderror" 
                                                id="number_of_people" name="number_of_people" required>
                                            <option value="">Pilih jumlah orang</option>
                                            @for($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}" {{ old('number_of_people') == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'orang' : 'orang' }}
                                            </option>
                                            @endfor
                                        </select>
                                        @error('number_of_people')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="special_requests" class="form-label">Permintaan Khusus</label>
                                        <textarea class="form-control @error('special_requests') is-invalid @enderror" 
                                                  id="special_requests" name="special_requests" rows="3" 
                                                  placeholder="Contoh: Makanan vegetarian, akses kursi roda, dll">{{ old('special_requests') }}</textarea>
                                        @error('special_requests')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <a href="{{ route('frontend.destinations.show', $destination) }}" class="btn btn-outline-primary btn-custom">
                                        Kembali ke Detail
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-custom">
                                        Buat Booking
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set minimum date to tomorrow
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        const tomorrowStr = tomorrow.toISOString().split('T')[0];
        document.getElementById('booking_date').min = tomorrowStr;
    </script>
</body>
</html> 