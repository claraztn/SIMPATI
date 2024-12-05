
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi dan Ruangan Disetujui</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #003f5c;
        }

        .card-header-warning {
            background-color: #ffc107;
        }

        .card-header-success {
            background-color: #28a745;
            color: white;
        }

        .card-header-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- Back Arrow Button -->
            <button onclick="history.back()" class="btn btn-link text-white me-3">
                <i class="bi bi-arrow-left-circle"></i>
            </button>
            <a class="navbar-brand text-white" href="#">SIMPATI</a>
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
                            <a class="nav-link text-white" href="#" style="text-decoration: none;">Home</a>
                        </li>
                        <!-- Menu Verifikasi Ruangan -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('verifikasi.ruangan') }}"
                                style="text-decoration: none;">Verifikasi Ruangan</a>
                        </li>
                        <!-- Menu Verifikasi Jadwal -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('verifikasi.jadwal') }}"
                                style="text-decoration: none;">Verifikasi Jadwal</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, Dekan
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

    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="h3 mb-4 text-center">Verifikasi dan Ruangan Disetujui</h1>

        <!-- Tabel Verifikasi Ruangan -->
        <div class="card shadow mb-5">
            <div class="card-header card-header-warning text-center">
                <h5 class="mb-0">Daftar Ruangan Berdasarkan Verifikasi Prodi</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-warning">
                        <tr>
                            <th>No</th>
                            <th>Request Prodi</th>
                            <th>Jumlah Ruangan Menunggu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruangans as $key => $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>

                                <td>{{ $item->programStudi->nama_prodi }}</td>

                                <td class="text-center">{{ $item->jumlah_ruangan }}</td>

                                <td class="text-center">
                                    <form method="POST"
                                        action="{{ route('verifikasi.ruangan.prodi.submit', $item->id_prodi) }}">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" name="action" value="approve"
                                            class="btn btn-success btn-sm">Setujui Semua</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada ruangan yang menunggu verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Verifikasi Ruangan -->
        <div class="card shadow mb-5">
            <div class="card-header card-header-warning text-center">
                <h5 class="mb-0">Daftar Ruangan Menunggu Verifikasi</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-warning">
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Gedung</th>
                            <th>Request Prodi</th>
                            <th>Kapasitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruanganPending as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td class="text-center">{{ $item->gedung }}</td>
                                <td class="text-center">{{ $item->programStudi->nama_prodi }}</td>
                                <td class="text-center">{{ $item->kapasitas }}</td>
                                <td class="text-center">
                                    <form
                                        action="{{ route('verifikasi.ruangan.submit', ['id_ruang' => $item->id_ruang]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="action" value="approve"
                                            class="btn btn-success btn-sm">Setujui</button>
                                        <button type="submit" name="action" value="reject"
                                            class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada ruangan yang menunggu verifikasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Ruangan Disetujui -->
        <div class="card shadow">
            <div class="card-header card-header-success text-center">
                <h5 class="mb-0">Daftar Ruangan yang Sudah Disetujui</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Gedung</th>
                            <th>Request Prodi</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruanganApproved as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td class="text-center">{{ $item->gedung }}</td>
                                <td class="text-center">{{ $item->programStudi->nama_prodi }}</td>
                                <td class="text-center">{{ $item->kapasitas }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada ruangan yang disetujui.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Ruangan Ditolak -->
        <div class="card shadow mt-3">
            <div class="card-header card-header-danger text-center">
                <h5 class="mb-0">Daftar Ruangan yang Ditolak</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Gedung</th>
                            <th>Request Prodi</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruanganRejected as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td class="text-center">{{ $item->gedung }}</td>
                                <td class="text-center">{{ $item->programStudi->nama_prodi }}</td>
                                <td class="text-center">{{ $item->kapasitas }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada ruangan yang ditolak.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 SIMPATI. All rights reserved.</p>
    </footer>

    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
