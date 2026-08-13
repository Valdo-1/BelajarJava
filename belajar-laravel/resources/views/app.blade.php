<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CMS Data Peserta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    <nav class="sidebar" id="sidebar" aria-label="Main navigation">

        <div class="sidebar-brand">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>CMS </span>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-title">
                Menu
            </li>

            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('peserta.index') }}" class="parent-link {{ request()->is('peserta*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Daftar Peserta</span>
                </a>
            </li>

            <li>
                <a href="{{ route('role.index') }}" class="{{ request()->is('role*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i>
                    <span>Role</span>
                </a>
            </li>

            <li>
                <a href="{{ route('category.index') }}" class="{{ request()->is('category*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="{{ route('product.index') }}" class="{{ request()->is('product*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Produk</span>
                </a>
            </li>

            <li>
                <!-- Route pesanan belum tersedia -->
                <a href="#" class="{{ request()->is('pesanan') ? 'active' : '' }}">
                    <i class="bi bi-cart-check"></i>
                    <span>Pesanan</span>
                </a>
            </li>

            <li class="menu-title mt-4">
                System
            </li>

            <li>
                <a href="#">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li>
                <form id="logout-form" action="#" method="POST" class="d-inline">
                    @csrf
                    <!-- Ganti action="#" dengan route('logout') bila sudah ada sistem login -->
                    <button type="submit" class="btn-logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main-content">

        <!-- NAVBAR -->

        <nav class="top-navbar">

            <div class="d-flex align-items-center gap-3">

                <button class="mobile-menu-btn" id="mobileMenuBtn" aria-expanded="false" aria-controls="sidebar">
                    <i class="bi bi-list"></i>
                </button>

                <h1 class="page-heading">
                    Dashboard
                </h1>

            </div>

            <div class="user-profile">

                <div class="user-avatar">
                    A
                </div>

                <div class="user-info">
                    <span>{{ Auth::user()->name }}</span>

                    <div class="user-role">
                        Administrator
                    </div>
                </div>

            </div>

        </nav>


        <!-- CONTENT -->

        <div class="content-wrapper">

            <div class="content-card">

                @yield('konten')

            </div>

        </div>

    </main>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.getElementById('sidebar');

            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('show');

                    // Accessibility update
                    const isExpanded = sidebar.classList.contains('show');
                    mobileMenuBtn.setAttribute('aria-expanded', isExpanded);
                });
            }
        });
    </script>
</body>

</html>