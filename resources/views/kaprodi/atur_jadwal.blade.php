<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atur Jadwal Kuliah - Dashboard Ketua Program Studi</title>
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                        <!-- Menu Atur Jadwal -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('kaprodi.atur-jadwal') }}" style="text-decoration: none;">Atur Jadwal</a>
                        </li> 
                    </ul>
                    <ul class="navbar-nav ms-auto"> 
                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, Ketua Program Studi
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
        <h2 class="mb-4">Atur Jadwal Kuliah</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('kaprodi.store-jadwal') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="kode_kelas" class="form-label">Kelas</label>
                <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $kls)
                        <option value="{{ $kls->kode_kelas }}">{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
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
                <select name="id_ruang" id="id_ruang" class="form-control" required>
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

            <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
        </form>

        <hr class="my-4">

        <h3>Jadwal Tersimpan</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>SKS</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $kls)
                    @if($kls->jadwal)
                        <tr>
                            <td>{{ $kls->kode_kelas }} - {{ $kls->mataKuliah->nama_mk }}</td>
                            <td>{{ $kls->jadwal->hari }}</td>
                            <td>{{ $kls->jadwal->ruangan->nama_ruang ?? 'Belum ditentukan' }}</td>
                            <td>{{ $kls->jadwal->jam_mulai }}</td>
                            <td>{{ $kls->jadwal->sks }}</td>
                            <td>{{ ucfirst($kls->jadwal->status) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
