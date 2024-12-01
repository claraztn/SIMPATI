<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .custom-navbar {
            background-color: #003f5c;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        .card-custom {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .status-badge {
            font-weight: bold;
            color: #28a745; /* Hijau untuk status aktif */
        }
        .profile-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .icon-title {
            margin-right: 8px;
            color: #555;
        }
        .divider {
            border-left: 1px solid #ccc;
            height: 30px;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md custom-navbar shadow-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <strong>SIMPATI</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="bi bi-list text-white"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}">Registrasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}">IRS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, Mahasiswa
                            </a>
                            <ul class="dropdown-menu border-0 shadow">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
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
                <h3 class="h5 pt-2">Dashboard Mahasiswa</h3>
            </div>
        </div>
    </div>
    <!-- Ganti 'my-5' menjadi kelas margin yang lebih kecil atau kosongkan -->
    <div class="container my-2">
        <!-- Alert -->
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Welcome, Widiawati Sihaloho</strong>
        </div>    

        <!-- Profile Card -->
        <div class="card profile-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture">
                </div>
                <div class="col-md-10">
                    <h5>Widiawati Sihaloho</h5>
                    <p class="text-muted mb-0">Informatika S1</p>
                    <p class="text-muted mb-0">24060122130057</p>
                </div>
            </div>
        </div>

        <!-- Academic Status and Performance -->
        <div class="row">
            <!-- Status Akademik -->
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-bank icon-title"></i>
                        <strong>Status Akademik</strong>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Informasi selengkapnya mengenai status akademik silakan menghubungi akademik fakultas masing-masing.</p>
                        <p>
                            <i class="bi bi-person-fill"></i> 
                            <strong>Dosen wali:</strong> Adhe Setya Pramayoga, M.T. <br>
                            <strong>NIP:</strong> 199112092024061001 <br>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="info-label">Semester Akademik Sekarang</span><br>
                                <span class="info-value">2024/2025 Ganjil</span>
                            </div>
                            <div class="divider"></div>
                            <div>
                                <span class="info-label">Semester Studi</span><br>
                                <span class="info-value">5</span>
                            </div>
                            <div class="divider"></div>
                            <div>
                                <span class="info-label">Status Akademik</span><br>
                                <span class="status-badge text-success">AKTIF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi Akademik -->
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-trophy icon-title"></i>
                        <strong>Prestasi Akademik</strong>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-around align-items-center">
                            <div>
                                <span class="info-label">IPk</span><br>
                                <span class="info-value">4.00</span>
                            </div>
                            <div class="divider"></div>
                            <div>
                                <span class="info-label">SKSk</span><br>
                                <span class="info-value">89</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>