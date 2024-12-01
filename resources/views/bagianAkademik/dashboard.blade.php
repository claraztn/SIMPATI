<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Bagian Akademik</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .custom-navbar {
            background-color: #003f5c; 
        }
        .card-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-info h5 {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .card-info p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #003f5c;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md custom-navbar shadow-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <strong>SIMPATI</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('bagianAkademik.dashboard') }}" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('bagianAkademik.manajemen_ruang') }}" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                Manajemen Ruang
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto"> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, siapa namanya
                            </a>
                            <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">                          
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>                               
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="card border-0 shadow my-3">
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">Dashboard Bagian Akademik</h3>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <!-- Alert -->
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Welcome, Beny Nugroho, S.Kom.</strong>
        </div>    

        <!-- Profile Card -->
        <div class="card profile-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture">
                </div>
                <div class="col-md-10">
                    <h5>Beny Nugroho, S.Kom.</h5>
                    <p class="text-muted mb-0">Laboratory Technician</p>
                    <p class="text-muted mb-0">H.7.198611152023101001</p>
                </div>
            </div>
        </div>        

        <!-- 3 Info Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info text-center p-3">
                    <h5>Total Ruang Dibuat</h5>
                    <p>10</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info text-center p-3">
                    <h5>Ruang Disetujui Dekan</h5>
                    <p>7/10</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info text-center p-3">
                    <h5>Ruang Ditolak Dekan</h5>
                    <p>3/10</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
