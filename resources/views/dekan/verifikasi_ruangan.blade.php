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
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- Back Arrow Button -->
            <button onclick="history.back()" class="btn btn-link text-white me-3">
                <i class="bi bi-arrow-left-circle"></i> <!-- Back arrow icon -->
            </button>
            
            <a class="navbar-brand text-white" href="#">SIMPATI</a>
            <div class="collapse navbar-collapse">
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
            <div class="card-header text-dark" style="background-color: #ffc107;">
                <h5 class="mb-0 text-center">Daftar Ruangan Menunggu Verifikasi</h5>
            </div>
            <div class="card-body">
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
                                    <form action="{{ route('dekan.verifikasi.ruangan', $item->id_ruang) }}" method="POST">
                                        @csrf
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
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 text-center">Daftar Ruangan yang Sudah Disetujui</h5>
            </div>
            <div class="card-body">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icon Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/bootstrap-icons.min.js"></script>
</body>

</html>
