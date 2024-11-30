<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atur Jadwal Kuliah</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #003f5c;
        }

        .card-header {
            background-color: #ffc107;
        }

        .card-header h5 {
            margin: 0;
        }

        .table th,
        .table td {
            text-align: center;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
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
                        <a class="nav-link text-white" href="/kaprodi/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/kaprodi/atur-jadwal">Atur Jadwal</a>
                    </li>
                </ul>
                <span class="navbar-text text-white">Hello, Ketua Program Studi</span>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="container my-5">
        <h1 class="h3 mb-4 text-center">Atur Jadwal Kuliah</h1>

        <!-- Form Atur Jadwal -->
        <div class="card shadow mb-5">
            <div class="card-header text-dark">
                <h5 class="mb-0 text-center">Form Atur Jadwal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kaprodi.store-jadwal') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">Kelas</label>
                        <select name="kode_kelas" id="kode_kelas" class="form-select" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $kls)
                            <option value="{{ $kls->kode_kelas }}">{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" id="hari" class="form-select" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_ruang" class="form-label">Ruangan</label>
                        <select name="id_ruang" id="id_ruang" class="form-select" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach($ruangan as $rg)
                            <option value="{{ $rg->id_ruang }}">{{ $rg->nama_ruang }} ({{ $rg->gedung }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control" min="1" max="4" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Jadwal Tersimpan -->
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 text-center">Jadwal Tersimpan</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-success">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Ruangan</th>
                            <th>Jam Mulai</th>
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Nama Pengampu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $key => $kls)
                        @if($kls->jadwal)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</td>
                            <td>{{ $kls->jadwal->hari }}</td>
                            <td>{{ $kls->jadwal->ruangan->nama_ruang ?? 'Belum ditentukan' }}</td>
                            <td>{{ $kls->jadwal->jam_mulai }}</td>
                            <td>{{ $kls->jadwal->sks }}</td>
                            <td>{{ ucfirst($kls->jadwal->status) }}</td>
                            <td>{{ $kls->dosenMataKuliah->dosen->nama ?? 'Belum Ditentukan' }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
