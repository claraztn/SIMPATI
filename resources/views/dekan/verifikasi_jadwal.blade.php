<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi dan Jadwal Disetujui</title>
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
                            <a class="nav-link text-white" href="{{ route('dekan.dashboard') }}" style="text-decoration: none;">Home</a>
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
                                Hello, {{ auth()->user()->username ?? 'Dekan' }}
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
        <h1 class="h3 mb-4 text-center">Verifikasi dan Jadwal Disetujui</h1>
        <!-- Dropdown Pilih Prodi -->
        <div class="mb-4">
            <label for="prodiSelect" class="form-label">Pilih Program Studi</label>
            <select class="form-select" id="prodiSelect" aria-label="Pilih Program Studi">
                <option selected>Pilih Prodi...</option>
                <option value="1">Informatika</option>
                <option value="2">Matematika</option>
                <option value="2">Statistika</option>
                <option value="3">Fisika</option>
                <option value="4">Kimia</option>
                <option value="5">Biologi</option>
                <option value="5">Bioteknologi</option>

            </select>
        </div>

<<<<<<< HEAD
        <!-- Tabel Verifikasi Jadwal -->
        <div class="card shadow mb-5">
            <div class="card-header text-dark" style="background-color: #ffc107;">
                <h5 class="mb-0 text-center">Daftar Jadwal Menunggu Verifikasi</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-warning">
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Ruangan</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwalPending as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->mataKuliah->nama_mk }}</td>
                                <td>{{ $item->ruangan->nama_ruang }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td class="text-center">
                                    <form
                                        action="{{ route('verifikasi.jadwal.submit', ['id_jadwal' => $item->id_jadwal]) }}"
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
                                <td colspan="6" class="text-center">Tidak ada jadwal yang menunggu verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Jadwal Disetujui -->
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 text-center">Daftar Jadwal yang Sudah Disetujui</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-success">
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Ruangan</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalApproved as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->mataKuliah->nama_mk }}</td>
                                <td>{{ $item->ruangan->nama_ruang }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->jam_mulai }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
=======
        <!-- Dropdown Pilih Prodi -->
        <div class="mb-4">
            <label for="prodiSelect" class="form-label">Pilih Program Studi</label>
            <select class="form-select" id="prodiSelect" aria-label="Pilih Program Studi">
                <option selected>Pilih Prodi...</option>
                <option value="1">Informatika</option>
                <option value="2">Matematika</option>
                <option value="2">Statistika</option>
                <option value="3">Fisika</option>
                <option value="4">Kimia</option>
                <option value="5">Biologi</option>
                <option value="5">Bioteknologi</option>
                
            </select>
        </div>

        <!-- Tabel Verifikasi Jadwal -->
<div class="card shadow mb-5">
    <div class="card-header text-dark" style="background-color: #ffc107;">
        <h5 class="mb-0 text-center">Daftar Jadwal Menunggu Verifikasi</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="text-center table-warning">
                <tr>
                <th>No</th>
                    <th>Kelas dan Matakuliah</th>
                    <th>Hari</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>SKS</th>
                    <th>Nama Pengampu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalPending as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->mata_kuliah }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->ruangan->nama_ruang }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->sks }}</td>
                        <td>{{ $item->nama_pengampu }}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Setujui</button>
                            <button class="btn btn-danger btn-sm">Tolak</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Tabel Jadwal Disetujui -->
<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0 text-center">Daftar Jadwal yang Sudah Disetujui</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="text-center table-success">
                <tr>
                    <th>No</th>
                    <th>Kelas dan Matakuliah</th>
                    <th>Hari</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>SKS</th>
                    <th>Nama Pengampu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalApproved as $key => $item)
                    <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->mata_kuliah }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->ruangan->nama_ruang }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->sks }}</td>
                        <td>{{ $item->nama_pengampu }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
>>>>>>> 97cbb3aca2c0ba92c27428880912265a3201bfdb

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Icon Library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/bootstrap-icons.min.js"></script>
</body>
</html>