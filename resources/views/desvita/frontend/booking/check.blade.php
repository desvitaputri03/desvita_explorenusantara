<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Booking - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #20b2aa; /* Biru tosca */
            --secondary-color: #48cae4; /* Biru muda */
            --success-color: #06b6d4; /* Cyan */
            --warning-color: #f59e0b; /* Orange */
            --info-color: #0891b2; /* Biru info */
            --danger-color: #ef4444; /* Merah */
            --light-color: #f8fafc; /* Putih */
            --dark-color: #1e293b; /* Hitam */
            --accent-color: #0ea5e9; /* Biru accent */
            --gradient-primary: linear-gradient(135deg, #20b2aa 0%, #48cae4 100%);
            --gradient-secondary: linear-gradient(135deg, #48cae4 0%, #06b6d4 100%);
            --gradient-success: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            --gradient-warning: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            --gradient-info: linear-gradient(135deg, #0891b2 0%, #0ea5e9 100%);
            --gradient-accent: linear-gradient(135deg, #0ea5e9 0%, #20b2aa 100%);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .btn-custom {
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1d4ed8, var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .check-section {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            padding: 80px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .check-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        .booking-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary-color);
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending { background: #fef3c7; color: #92400e; }
        .status-confirmed { background: #d1fae5; color: #065f46; }
        .status-cancelled { background: #fee2e2; color: #991b1b; }
        .status-completed { background: #dbeafe; color: #1e40af; }

        .section-title {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer {
            background: linear-gradient(135deg, #1e293b, #334155);
            color: white;
            padding: 40px 0 20px;
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

    <!-- Check Booking Section -->
    <section class="check-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="check-card">
                        <div class="text-center mb-4">
                            <h2 class="section-title">Cek Status Booking</h2>
                            <p class="text-muted">Masukkan email atau ID booking Anda untuk melihat status booking</p>
                        </div>

                        <form method="POST" action="{{ route('booking.check.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="search_type" class="form-label">Cari Berdasarkan</label>
                                <select class="form-control" id="search_type" name="search_type" onchange="toggleSearchField()">
                                    <option value="email">Email</option>
                                    <option value="booking_id">ID Booking</option>
                                </select>
                            </div>
                            <div class="mb-3" id="email_field">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ $request->email ?? '' }}">
                            </div>
                            <div class="mb-3" id="booking_id_field" style="display: none;">
                                <label for="booking_id" class="form-label">ID Booking</label>
                                <input type="number" class="form-control" id="booking_id" name="booking_id" 
                                       value="{{ $request->booking_id ?? '' }}">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-custom">
                                    <i class="fas fa-search me-2"></i>Cek Status
                                </button>
                            </div>
                        </form>

                        @if(isset($bookings))
                            <hr class="my-4">
                            <h4 class="mb-3">Hasil Pencarian</h4>
                            
                            @if($bookings->count() > 0)
                                @foreach($bookings as $booking)
                                <div class="booking-card">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <h5 class="mb-2">{{ $booking->destination->name }}</h5>
                                            <p class="text-muted mb-1">
                                                <i class="fas fa-calendar me-2"></i>
                                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                                            </p>
                                            <p class="text-muted mb-1">
                                                <i class="fas fa-users me-2"></i>
                                                {{ $booking->number_of_people }} orang
                                            </p>
                                            @if($booking->notes)
                                            <p class="text-muted mb-0">
                                                <i class="fas fa-comment me-2"></i>
                                                {{ $booking->notes }}
                                            </p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 text-md-end">
                                            <span class="status-badge status-{{ $booking->status }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Tidak ada booking ditemukan untuk email ini</p>
                                </div>
                            @endif
                        @endif
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
                    <h5 class="mb-3"><i class="fas fa-mountain me-2"></i>MyWisata</h5>
                    <p class="text-muted">Menjadi destinasi wisata terbaik dengan menggabungkan keindahan alam dan budaya lokal yang autentik.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="social-links">
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="text-muted mb-0">&copy; 2024 MyWisata. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSearchField() {
            const searchType = document.getElementById('search_type').value;
            const emailField = document.getElementById('email_field');
            const bookingIdField = document.getElementById('booking_id_field');
            
            if (searchType === 'email') {
                emailField.style.display = 'block';
                bookingIdField.style.display = 'none';
                document.getElementById('booking_id').removeAttribute('required');
                document.getElementById('email').setAttribute('required', 'required');
            } else {
                emailField.style.display = 'none';
                bookingIdField.style.display = 'block';
                document.getElementById('email').removeAttribute('required');
                document.getElementById('booking_id').setAttribute('required', 'required');
            }
        }
    </script>
</body>
</html> 