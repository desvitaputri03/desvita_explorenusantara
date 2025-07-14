<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #20b2aa;    /* Biru tosca */
            --secondary-color: #48cae4;  /* Biru muda */
            --accent-color: #06b6d4;     /* Cyan */
            --success-color: #10b981;    /* Hijau */
            --warning-color: #f59e0b;    /* Orange */
            --danger-color: #ef4444;     /* Merah */
            --light-color: #f8fafc;
            --dark-color: #1e293b;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: var(--light-color);
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 1rem;
            color: white;
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            width: 25px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        /* Navbar */
        .admin-navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            border-radius: 1rem;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        /* Stats Card */
        .stats-card {
            border-radius: 1rem;
            overflow: hidden;
        }

        .stats-icon {
            transition: all 0.3s ease;
        }

        .stats-card:hover .stats-icon {
            transform: scale(1.1);
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(32, 178, 170, 0.3);
        }

        /* Tables */
        .table th {
            font-weight: 600;
            background-color: var(--light-color);
            border-bottom: 2px solid var(--primary-color);
        }

        /* Status Badges */
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 500;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        /* User Menu */
        .user-menu {
            background-color: white;
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        .user-menu .dropdown-item {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }

        .user-menu .dropdown-item:hover {
            background-color: var(--light-color);
            transform: translateX(5px);
        }

        /* Alerts */
        .alert {
            border-radius: 1rem;
            border: none;
            padding: 1rem 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
        }

        /* Forms */
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(32, 178, 170, 0.25);
        }

        .input-group-text {
            border: 2px solid #e2e8f0;
            background-color: var(--light-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .admin-navbar {
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex align-items-center mb-4 mt-2">
            <i class="fas fa-mountain fa-2x me-2"></i>
            <h4 class="mb-0">MyWisata Admin</h4>
        </div>
        
        <nav class="nav flex-column">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.destinations.index') }}" class="nav-link {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                <i class="fas fa-mountain"></i> Destinasi
            </a>
            <a href="{{ route('admin.tourists.index') }}" class="nav-link {{ request()->routeIs('admin.tourists.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Wisatawan
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Pemesanan
            </a>
            <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Ulasan
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Galeri
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="admin-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">@yield('title')</h4>
                @auth
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 50px; padding: 8px 20px;">
                        <i class="fas fa-user-circle me-2"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="border-radius: 15px; border: none; margin-top: 10px;">
                        <li>
                            <a class="dropdown-item py-2 px-4" href="{{ route('admin.profile.edit') }}">
                                <i class="fas fa-user-edit me-2"></i>Edit Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-4" href="{{ route('admin.profile.password') }}">
                                <i class="fas fa-key me-2"></i>Ubah Password
                            </a>
                        </li>
                        <li><hr class="dropdown-divider mx-2"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 px-4 text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </nav>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 