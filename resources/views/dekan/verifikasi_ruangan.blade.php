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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/verifikasi-ruangan">Verifikasi Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/verifikasi-jadwal">Verifikasi Jadwal</a>
                    </li>
                </ul>
                <span class="navbar-text text-white">Hello, Dekan</span>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="h3 mb-4 text-center">Verifikasi dan Ruangan Disetujui</h1>

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
                            <td class="text-center">{{ $item->kapasitas }}</td>
                            <td class="text-center">
                                <form action="{{ route('verifikasi.ruangan', ['id_ruang' => $item->id_ruang]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Setujui</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada ruangan yang menunggu verifikasi.</td>
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
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruanganApproved as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $item->nama_ruang }}</td>
                            <td class="text-center">{{ $item->gedung }}</td>
                            <td class="text-center">{{ $item->kapasitas }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada ruangan yang disetujui.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Tabel Ruangan Ditolak -->
    <div class="card shadow">
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
                        <th>Kapasitas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ruanganRejected as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->nama_ruang }}</td>
                        <td class="text-center">{{ $item->gedung }}</td>
                        <td class="text-center">{{ $item->kapasitas }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada ruangan yang ditolak.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 SIMPATI. All rights reserved.</p>
    </footer>

    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
