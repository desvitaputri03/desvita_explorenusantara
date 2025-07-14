<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - MyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --accent-color: #0ea5e9;
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
        
        .sidebar {
            min-height: 100vh;
            background: var(--gradient-primary);
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 5px 0 20px rgba(0,0,0,0.1);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="rgba(255,255,255,0.1)"><circle cx="50" cy="50" r="2"/></svg>');
            background-size: 20px 20px;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 15px 20px;
            border-radius: 15px;
            margin: 8px 15px;
            font-weight: 500;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .main-content {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .navbar-custom {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        
        .content-wrapper {
            padding: 40px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .btn-custom {
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
        }

        .btn-success {
            background: var(--gradient-success);
            border: none;
        }

        .btn-warning {
            background: var(--gradient-warning);
            border: none;
        }

        .btn-info {
            background: var(--gradient-info);
            border: none;
        }

        .btn-danger {
            background: var(--danger-color);
            border: none;
        }

        .btn-secondary {
            background: var(--gradient-secondary);
            border: none;
        }

        /* Sidebar brand styling */
        .sidebar-brand {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin-bottom: 1rem;
        }

        .sidebar-brand .brand-icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .sidebar-brand h5 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .sidebar-brand small {
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar p-0">
                    <div class="sidebar-brand">
                        <div class="brand-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h5>MyWisata</h5>
                        <small>Admin Panel</small>
                    </div>
                    
                    <nav class="nav flex-column">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}" href="{{ route('admin.destinations.index') }}">
                            <i class="fas fa-map-marker-alt me-3"></i>Destinasi
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.tourists.*') ? 'active' : '' }}" href="{{ route('admin.tourists.index') }}">
                            <i class="fas fa-users me-3"></i>Wisatawan
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">
                            <i class="fas fa-calendar-check me-3"></i>Booking
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                            <i class="fas fa-star me-3"></i>Review
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                            <i class="fas fa-images me-3"></i>Galeri
                        </a>
                        <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
                        <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
                            <i class="fas fa-user-cog me-3"></i>Profil
                        </a>
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <i class="fas fa-home me-3"></i>Lihat Website
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                                <i class="fas fa-sign-out-alt me-3"></i>Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-0">
                <div class="main-content">
                    <!-- Top Navbar -->
                    <nav class="navbar navbar-custom">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-primary d-md-none me-3" id="sidebarToggle">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <h4 class="mb-0">
                                    <i class="fas fa-chart-line me-2 text-primary"></i>
                                    @yield('title', 'Admin Dashboard')
                                </h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle btn-custom" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fas fa-user-cog me-2"></i>Profil</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Content -->
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fitur Belum Tersedia -->
    <div class="modal fade" id="fiturBelumTersediaModal" tabindex="-1" aria-labelledby="fiturBelumTersediaLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="fiturBelumTersediaLabel">Fitur Belum Tersedia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Fitur ini belum tersedia. Akan hadir pada pengembangan selanjutnya.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Add active class to current nav item
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html> 