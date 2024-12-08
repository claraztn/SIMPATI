<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Ketua Program Studi</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .custom-navbar {
            background-color: #003f5c;
        }

        .nav-link:hover {
            text-decoration: underline;
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <!-- Menu Home -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('kaprodi.dashboard') }}" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                Home
                            </a>
                        </li>
                        <!-- Menu Atur Jadwal -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('kaprodi.atur-jadwal') }}"
                                style="text-decoration: none;">Atur Jadwal</a>
                        </li>
                        <!-- Menu Atur Matakuliah -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('kaprodi.atur-matakuliah') }}"
                                style="text-decoration: none;">Atur Mata Kuliah</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto"> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{ auth()->user()->username ?? 'Kaprodi' }}
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
                <h3 class="h5 pt-2">Dashboard Ketua Program Studi</h3>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <!-- Alert -->
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Welcome, Dr. Aris Sugiharto, S.Si., M.Kom'</strong>
        </div>    

        <!-- Profile Card -->
        <div class="card profile-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture">
                </div>
                <div class="col-md-10">
                    <h5>Dr. Aris Sugiharto, S.Si., M.Kom'</h5>
                    <p class="text-muted mb-0">Ketua Program Studi</p>
                    <p class="text-muted mb-0">H.7.198611152023101001</p>
                </div>
            </div>
        </div>        

        <!-- 3 Info Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info text-center p-3">
                    <h5>Jadwal yang sudah disetujui oleh Dekan</h5>
                    <p>7/10</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>


</html>
