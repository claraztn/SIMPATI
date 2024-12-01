<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atur Jadwal Kuliah</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-custom {
            background-color: #003f5c;
        }

        .card-header {
            background-color: #608BC1;
        }

        .card-header h5 {
            margin: 0;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .dosen-group {
            margin-bottom: 10px;
        }

        .btn-remove,
        .btn-add {
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .btn-remove {
            color: white;
            background-color: #dc3545; /* Red */
        }

        .btn-add {
            color: white;
            background-color: #007bff; /* Blue */
        }

        .btn-remove:hover {
            background-color: #c82333; /* Darker Red */
        }

        .btn-add:hover {
            background-color: #0056b3; /* Darker Blue */
        }

        .btn-remove:focus,
        .btn-add:focus {
            outline: none;
        }

        .btn-remove:active,
        .btn-add:active {
            background-color: #e53e3e; /* Even darker red */
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- Back Arrow Button -->
            <button onclick="history.back()" class="btn btn-link text-white me-3">
                <i class="bi bi-arrow-left-circle"></i>
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
    <div class="container my-4">
        <div class="card-header bg-light">
            <h4 class="h5 pt-2">Silahkan Atur Jadwal Kuliah Tiap Program Studi!</h4>
        </div>
        <!-- Form Atur Jadwal -->
        <div class="card shadow mb-5">
            <div class="card-header text-dark">
                <h5 class="mb-0 text-center">Form Atur Jadwal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kaprodi.store-jadwal') }}" method="POST">
                    @csrf

                    <!-- Kelas, Hari, Ruangan, Jam Mulai, SKS -->
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

                    <!-- Dosen Pengampu -->
                    <div id="dosen-section">
                        <div class="dosen-group" id="dosen1-group">
                            <label for="dosen1" class="form-label">Dosen Pengampu 1</label>
                            <select name="dosen[]" id="dosen1" class="form-select" required>
                                <option value="">Pilih Dosen</option>
                                <option value="Dosen 1">Dosen 1</option>
                                <option value="Dosen 2">Dosen 2</option>
                                <option value="Dosen 3">Dosen 3</option>
                                <option value="Dosen 4">Dosen 4</option>
                            </select>
                        </div>

                        <div class="dosen-group" id="dosen2-group">
                            <label for="dosen2" class="form-label">Dosen Pengampu 2</label>
                            <select name="dosen[]" id="dosen2" class="form-select" required>
                                <option value="">Pilih Dosen</option>
                                <option value="Dosen 1">Dosen 1</option>
                                <option value="Dosen 2">Dosen 2</option>
                                <option value="Dosen 3">Dosen 3</option>
                                <option value="Dosen 4">Dosen 4</option>
                            </select>
                        </div>
                    </div>

                    <!-- Button untuk Menambah atau Menghapus Dosen Pengampu -->
                    <div class="mb-3">
                        <button type="button" id="add-dosen-btn" class="btn btn-add">Tambah Dosen</button>
                        <button type="button" id="remove-dosen-btn" class="btn btn-remove">Hapus Dosen</button>
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
                            <td>{{ $kls->jadwal->status }}</td>
                            <td>{{ implode(', ', $kls->jadwal->dosens->pluck('nama')->toArray()) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-dosen-btn').addEventListener('click', function() {
            const dosenGroups = document.querySelectorAll('.dosen-group');
            const nextGroup = document.createElement('div');
            nextGroup.classList.add('dosen-group');
            const groupCount = dosenGroups.length + 1;
            nextGroup.innerHTML = `
                <label for="dosen${groupCount}" class="form-label">Dosen Pengampu ${groupCount}</label>
                <select name="dosen[]" id="dosen${groupCount}" class="form-select" required>
                    <option value="">Pilih Dosen</option>
                    <option value="Dosen 1">Dosen 1</option>
                    <option value="Dosen 2">Dosen 2</option>
                    <option value="Dosen 3">Dosen 3</option>
                    <option value="Dosen 4">Dosen 4</option>
                </select>
            `;
            document.getElementById('dosen-section').appendChild(nextGroup);
        });

        document.getElementById('remove-dosen-btn').addEventListener('click', function() {
            const dosenGroups = document.querySelectorAll('.dosen-group');
            if (dosenGroups.length > 2) {
                dosenGroups[dosenGroups.length - 1].remove();
            }
        });
    </script>
</body>

</html>
