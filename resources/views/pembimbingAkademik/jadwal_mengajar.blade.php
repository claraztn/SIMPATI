<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kaprodi</title>
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
            <a class="navbar-brand text-white" href="/pembimbing-akademik/dashboard">
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
                        <!-- Menu IRS Mahasiswa -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pembimbingAkademik.irs-mahasiswa') }}"
                                style="text-decoration: none;">IRS Mahasiswa</a>
                        </li>
                        <!-- Menu Jadwal Mengajar -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pembimbingAkademik.jadwal-mengajar') }}"
                                style="text-decoration: none;">Jadwal Mengajar</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, Pembimbing Akademik
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
    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="h3 mb-4 text-center">JADWAL DOSEN {{ $infoDosen->nama_dosen }}
            <br> TAHUN AJARAN 2024 SEMESTER GANJIL
            <br> UNIVERSITAS DIPONEGORO
        </h1>
        <!-- Tabel Verifikasi Jadwal -->
        <div class="card shadow mb-5">

            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-primary">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Kelas</th>
                            <th>Ruang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($mkRelated as $item)
                            <tr class="text-center">
                                <td> {{ $i++ }}</td>
                                <td> {{ $item->jadwal->hari }}</td>
                                <td> {{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_selesai }}</td>
                                <td> {{ $item->mataKuliah->nama_mk }}</td>
                                <td> {{ $item->mataKuliah->semester }}</td>
                                <td> {{ $item->jadwal->kode_kelas }}</td>
                                <td> {{ $item->jadwal->ruangan->nama_ruang }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
