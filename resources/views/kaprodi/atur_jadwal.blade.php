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
            background-color: #dc3545;
            /* Red */
        }

        .btn-add {
            color: white;
            background-color: #007bff;
            /* Blue */
        }

        .btn-remove:hover {
            background-color: #c82333;
            /* Darker Red */
        }

        .btn-add:hover {
            background-color: #0056b3;
            /* Darker Blue */
        }

        .btn-remove:focus,
        .btn-add:focus {
            outline: none;
        }

        .btn-remove:active,
        .btn-add:active {
            background-color: #e53e3e;
            /* Even darker red */
        }

        .highlight-border {
            border: 2px solid #007bff !important;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
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
                            <a class="nav-link text-white" href="/kaprodi/dashboard"
                                style="text-decoration: none;">Home</a>
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

    <!-- Main Content -->
    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
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
                    <div class="mb-3">
                        <div class="row">
                            <input type="number" hidden name="id_jadwal" id="id_jadwal" class="form-control">

                            <div class="col-md-6">
                                <label for="kode_kelas" class="form-label">Kelas</label>
                                <select name="kode_kelas" id="kode_kelas" class="form-select" required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="A" {{ old('kode_kelas') == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('kode_kelas') == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ old('kode_kelas') == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ old('kode_kelas') == 'D' ? 'selected' : '' }}>D</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="mata" class="form-label">Mata Kuliah</label>
                                <select name="kode_mk" id="kode_mk" class="form-select" required>
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach ($mataKuliah as $mk)
                                        <option value="{{ $mk->kode_mk }}" data-sks="{{ $mk->sks }}"
                                            {{ old('kode_mk') == $mk->kode_mk ? 'selected' : '' }}>
                                            {{ $mk->nama_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                            @foreach ($ruangan as $rg)
                                <option value="{{ $rg->id_ruang }}">{{ $rg->nama_ruang }} ({{ $rg->gedung }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control" min="1"
                            max="4" required>
                    </div>

                    <!-- Dosen Pengampu -->
                    <div id="dosen-section">
                        <div class="dosen-group" id="dosen1-group">
                            <label for="dosen1" class="form-label">Dosen Pengampu 1</label>
                            <select name="dosen_pengampu[]" id="dosen1" class="form-select" required>
                                <option value="">Pilih Dosen</option>
                                @foreach ($dosen as $item)
                                    <option value={{ $item->nip }}>{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="dosen-group" id="dosen2-group">
                            <label for="dosen2" class="form-label">Dosen Pengampu 2</label>
                            <select name="dosen_pengampu[]" id="dosen2" class="form-select" required>
                                <option value="">Pilih Dosen</option>
                                @foreach ($dosen as $item)
                                    <option value={{ $item->nip }}>{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Button untuk Menambah atau Menghapus Dosen Pengampu -->
                    <div class="mb-3">
                        <button type="button" id="add-dosen-btn" class="btn btn-add">Tambah Dosen</button>
                        <button type="button" id="remove-dosen-btn" class="btn btn-remove">Hapus Dosen</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="btn-submit" class="btn btn-primary">Simpan Jadwal</button>
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
                            <th>Kelas </th>
                            <th>Mata Kuliah</th> 
                            <th>Hari</th>
                            <th>Ruangan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Nama Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($jadwals as $jadwal_kelas)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $jadwal_kelas->kode_kelas }}</td>
                                <td>{{ $jadwal_kelas->mataKuliah->nama_mk }}</td>
                                <td>{{ $jadwal_kelas->hari }}</td>
                                <td>{{ $jadwal_kelas->ruangan->nama_ruang ?? 'Belum ditentukan' }}</td>
                                <td>{{ $jadwal_kelas->jam_mulai }}</td>
                                <td>{{ $jadwal_kelas->jam_selesai }}</td>
                                <td>{{ $jadwal_kelas->mataKuliah->sks }}</td>
                                <td>{{ $jadwal_kelas->status }}</td>
                                <td>
                                    @foreach ($jadwal_kelas->dosens as $dosen)
                                        {{ $dosen->nama_dosen }}@if (!$loop->last)
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-warning btn-sm edit-btn"
                                        data-id="{{ $jadwal_kelas->id_jadwal }}"
                                        data-kode_kelas="{{ $jadwal_kelas->kode_kelas }}"
                                        data-mk="{{ $jadwal_kelas->kode_mk }}" data-hari="{{ $jadwal_kelas->hari }}"
                                        data-ruang="{{ $jadwal_kelas->id_ruang }}"
                                        data-jam_mulai="{{ $jadwal_kelas->jam_mulai }}"
                                        data-sks="{{ $jadwal_kelas->mataKuliah->sks }}"
                                        data-dosen="{{ json_encode($jadwal_kelas->dosens->pluck('nip')->toArray()) }}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {

                    const idJadwal = this.dataset.id;
                    const kodeKelas = this.dataset.kode_kelas;
                    const kodeMk = this.dataset.mk;
                    const hari = this.dataset.hari;
                    const ruang = this.dataset.ruang;
                    const jamMulai = this.dataset.jam_mulai;
                    const sks = this.dataset.sks;
                    const dosen = JSON.parse(this.dataset.dosen);

                    document.querySelector('.card-body form').scrollIntoView({
                        behavior: 'smooth'
                    });

                    const form = document.querySelector('.card-body form');
                    form.action = `/kaprodi/update-jadwal/${idJadwal}`;

                    // Populate the form fields
                    document.querySelector('#id_jadwal').value = idJadwal;
                    document.querySelector('#kode_kelas').value = kodeKelas;
                    document.querySelector('#kode_mk').value = kodeMk;
                    document.querySelector('#hari').value = hari;
                    document.querySelector('#id_ruang').value = ruang;
                    document.querySelector('#jam_mulai').value = jamMulai;
                    document.querySelector('#sks').value = sks;

                    dosen.forEach((nip, index) => {
                        if (index === 0) {
                            document.querySelector('#dosen1').value = nip;
                        } else if (index === 1) {
                            document.querySelector('#dosen2').value = nip;
                        }
                    });
                    document.querySelector('.card-body').scrollIntoView({
                        behavior: 'smooth'
                    });
                    highlightFormBorders();

                });
            });
        });

        function highlightFormBorders() {
            const formElements = document.querySelectorAll('.form-select, .form-control');
            formElements.forEach((element) => {
                element.classList.add('highlight-border');
                setTimeout(() => {
                    element.classList.remove('highlight-border');
                }, 2000);
            });
        }
    </script>

    <script>
        const dosenData = @json($dosenArray);
        // console.log(dosenData);

        document.getElementById('add-dosen-btn').addEventListener('click', function() {
            const dosenGroups = document.querySelectorAll('.dosen-group');
            const nextGroup = document.createElement('div');
            nextGroup.classList.add('dosen-group');
            const groupCount = dosenGroups.length + 1;

            const selectedValues = Array.from(document.querySelectorAll('.form-select'))
                .map(select => select.value)
                .filter(value => value !== "");

            let options = `<option value="">Pilih Dosen</option>`;
            dosenData.forEach(function(item) {
                if (!selectedValues.includes(item.nip)) {
                    options += `<option value="${item.nip}">${item.nama_dosen}</option>`;
                }
            });

            nextGroup.innerHTML = `
        <label for="dosen${groupCount}" class="form-label">Dosen Pengampu ${groupCount}</label>
        <select name="dosen_pengampu[]" id="dosen${groupCount}" class="form-select" required>
            ${options}
        </select>
    `;
            document.getElementById('dosen-section').appendChild(nextGroup);

            attachChangeListeners();
            updateOpsi();
        });

        document.getElementById('remove-dosen-btn').addEventListener('click', function() {
            const dosenGroups = document.querySelectorAll('.dosen-group');
            if (dosenGroups.length > 2) {
                dosenGroups[dosenGroups.length - 1].remove();
            }
            updateOpsi();
        });

        function attachChangeListeners() {
            document.querySelectorAll('.form-select').forEach(select => {
                select.removeEventListener('change', updateOpsi); // cegah duplikat pas bagian tambah select
                select.addEventListener('change', updateOpsi);
            });
        }

        // dosen nya agar jika sdh dipilih tdk bs dipilih lg
        function updateOpsi() {
            let selectedValues = Array.from(document.querySelectorAll('.form-select'))
                .map(select => select.value)
                .filter(value => value !== "");
            // update
            document.querySelectorAll('.form-select').forEach(select => {
                Array.from(select.options).forEach(option => {
                    if (selectedValues.includes(option.value) && option.value !== select.value) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                    }
                });
            });
        }

        attachChangeListeners();

        document.querySelectorAll('.form-select').forEach(select => {
            select.addEventListener('change', updateOpsi);
        });
        //


        // get sks based mk yg diplih
        document.addEventListener('DOMContentLoaded', function() {
            var kodeMkSelect = document.getElementById('kode_mk');
            var sksInput = document.getElementById('sks');

            kodeMkSelect.addEventListener('change', function() {
                var selectedOption = kodeMkSelect.options[kodeMkSelect.selectedIndex];
                var sks = selectedOption.getAttribute('data-sks');

                sksInput.value = sks;
            });
        });
    </script>
</body>

</html>