<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IRS MAHASISWA</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Optional Custom Styles -->
    <style>
        .custom-navbar {
            background-color: #003f5c;
        }

        .btn-fill,
        .btn-history {
            background-color: #003f5c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-history {
            background-color: #00bfff;
        }

        .btn-fill:hover,
        .btn-history:hover {
            background-color: #002a42;
        }

        .form-container {
            max-width: 400px;
            margin: 5px auto;
            padding: 5px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.1);
        }

        label,
        select,
        input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }

        .btn-save {
            background-color: #28a745;
            /* Green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            /* Make it full-width */
            margin-top: 20px;
        }

        .btn-disable {
            background-color: #828282;
            /* Green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            /* Make it full-width */
            margin-top: 20px;
        }

        .btn-save:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        /* Custom styles for navbar links */
        .navbar-nav .nav-item .nav-link {
            color: white;
            text-decoration: none;
        }

        /* On hover, add underline */
        .navbar-nav .nav-item .nav-link:hover {
            text-decoration: underline;
        }

        .accordion-item {
            border: none;
        }

        .accordion-button {
            background-color: #003f5c;
            color: white;
        }

        .accordion-button:not(.collapsed) {
            background-color: #00bfff;
        }

        .accordion-header button {
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md custom-navbar shadow-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <strong>SIMPATI</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="bi bi-list text-white"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}">IRS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.detail-irs-khs') }}">Detail IRS &
                                KHS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="accountDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{ auth()->user()?->username }}
                            </a>
                            <ul class="dropdown-menu border-0 shadow">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Terjadi Kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">IRS MAHASISWA</h3>
            </div>
            <div class="card-body">
                @if ($irs)
                    <div class="alert alert-primary mt-2" role="alert">
                        <div class="d-flex justify-content-between">
                            <h5>Anda sudah mengajukan IRS untuk perkuliahan
                                semester <strong>{{ $semester ?? 'N/A' }}</strong>.
                            </h5>
                            <h6>Status:
                                {{ $irs?->isverified ? 'Sudah disetujui dosen PA' : 'Belum disetujui dosen PA' }}
                            </h6>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        <div class="d-flex justify-content-between">
                            <h5>Anda belum mengajukan IRS untuk perkuliahan semester
                                <strong>{{ $semester ?? 'N/A' }}</strong>.
                            </h5>
                            <h6>Status:
                                Belum kontrak IRS
                            </h6>
                        </div>
                    </div>
                @endif
                <div class="button-container mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="action">
                            <button class="btn-fill" onclick="window.location.href='{{ route('mahasiswa.irs') }}'">Buat
                                IRS</button>
                            <button class="btn-fill" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Detail
                                <i class="fas fa-chevron-down"></i> <!-- Ikon panah Font Awesome -->
                            </button>
                            @if ($irs?->isverified)
                                <button class="btn-fill" onclick="window.location.href='{{ route('irs.unduh') }}'"><i
                                        class="fa fa-file"></i> Unduh IRS</button>
                            @else
                            @endif
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#" onclick="showContent('irs')">IRS</a></li>
                                <li><a class="dropdown-item" href="#" onclick="showContent('khs')">KHS</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="showContent('transkrip')">Transkrip</a>
                                </li>
                            </ul>
                        </div>
                        <div class="info">
                            <h6 id="totalSks" class="me-5 text-primary">Maks. SKS anda: {{ $batasSKS }} </h6>
                            @if ($irs)
                                <h6 class="me-5">Total SKS diajukan: <span class="h5"
                                        id="totalPilih">{{ $irs->jmlsks }}</span>
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Tabel Mata Kuliah -->
                <div class="card shadow mb-4">
                    <form method="POST" id="formIRS" action="{{ route('mahasiswa.irs.update', $irs->id) }}">
                        @csrf
                        <input hidden name="total_sks" id="total_sks" value="0">

                        <div class="card shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Daftar Mata Kuliah</h6>
                                    <div class="semester-filter">
                                        <select name="semester" class="form-control" id="semesterFilter">
                                            <option value="s" {{ request('semester') == 's' ? 'selected' : '' }}>
                                                Semua Semester
                                            </option>
                                            @for ($semester = 1; $semester <= 8; $semester++)
                                                <option value="{{ $semester }}"
                                                    {{ request('semester') == $semester ? 'selected' : '' }}>
                                                    Semester {{ $semester }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="matkulTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Kode MK</th>
                                            <th>Nama MK</th>
                                            <th>Hari & Jam</th>
                                            <th>Ruang</th>
                                            <th>Semester</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $i = 1;
                                    @endphp
                                    <tbody>
                                        @forelse ($jadwalMk as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->kode_kelas }}</td>
                                                <td>{{ $item->kode_mk }}</td>
                                                <td>{{ $item->mataKuliah->nama_mk }}</td>
                                                <td>{{ $item->hari }}, {{ $item->jam_mulai }} -
                                                    {{ $item->jam_selesai }}</td>
                                                <td>{{ $item->ruangan->nama_ruang }}</td>
                                                <td>Semester {{ $item->mataKuliah->semester }}</td>
                                                <td>{{ $item->mataKuliah->sks }}</td>
                                                <td>
                                                    @foreach ($item->mataKuliah->dosenMataKuliah as $dosenMataKuliah)
                                                        {{ $dosenMataKuliah->dosen->nama_dosen }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="kode_mk[]" class="sks-checkbox"
                                                        value="{{ $item->kode_mk }}"
                                                        data-kode="{{ $item->kode_mk }}"
                                                        data-sks="{{ $item->mataKuliah->sks }}"
                                                        data-hari="{{ $item->hari }}"
                                                        data-mulai="{{ $item->jam_mulai }}"
                                                        data-selesai="{{ $item->jam_selesai }}"
                                                        data-ruang="{{ $item->id_ruang }}"
                                                        data-jadwal="{{ $item->id_jadwal }}"
                                                        @if (in_array($item->id_jadwal, $selectedJadwalIds)) checked @endif>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    Tidak ada jadwal kuliah ditemukan.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        @if ($irs && !$irs->isverified)
                            <button class="btn-save" id="btnSave" type="submit">Simpan Perubahan</button>
                        @elseif ($irs && $irs->isverified)
                            <button class="btn-disable" disabled id="btnSave" type="submit">Sudah Mengajukan
                                IRS</button>
                        @else
                            <button class="btn-save" id="btnSave" type="submit">Simpan</button>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('semesterFilter').addEventListener('change', function() {
            let semester = this.value;
            let urlPath = window.location.pathname;
            let irsId = urlPath.split('/').pop();

            let urlFinal = '/mahasiswa/irs/edit/' + irsId;

            if (semester && semester !== 's') {
                urlFinal += '?semester=' + semester;
            }

            window.location.href = urlFinal;

        });

        document.addEventListener('DOMContentLoaded', function() {
            const batasSKS = parseInt('{{ $batasSKS }}');
            const checkboxes = document.querySelectorAll('.sks-checkbox');
            const totalPilihElement = document.getElementById('totalPilih');
            const btnSave = document.getElementById('btnSave');

            let totalSKS = 0;

            function updateTotalSKS() {
                totalSKS = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        totalSKS += parseInt(checkbox.getAttribute('data-sks'));
                    }
                });
                totalPilihElement.textContent = totalSKS;
                document.getElementById('total_sks').value = totalSKS;
            }

            updateTotalSKS();

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateTotalSKS();
                });
            });


            document.querySelector('form').addEventListener('submit', function() {
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const kodeMk = checkbox.getAttribute('data-kode');
                        const hari = checkbox.getAttribute('data-hari');
                        const mulai = checkbox.getAttribute('data-mulai');
                        const selesai = checkbox.getAttribute('data-selesai');
                        const ruang = checkbox.getAttribute('data-ruang');
                        const jadwal = checkbox.getAttribute('data-jadwal');

                        const inputs = [{
                                name: 'kode_mk[]',
                                value: kodeMk
                            },
                            {
                                name: 'hari[]',
                                value: hari
                            },
                            {
                                name: 'jam_mulai[]',
                                value: mulai
                            },
                            {
                                name: 'jam_selesai[]',
                                value: selesai
                            },
                            {
                                name: 'ruang[]',
                                value: ruang
                            },
                            {
                                name: 'id_jadwal[]',
                                value: jadwal
                            },
                        ];

                        inputs.forEach(inputData => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = inputData.name;
                            input.value = inputData.value;
                            document.forms[0].appendChild(input);
                        });
                    }
                });
                updateTotalSKS();

            });


            btnSave.addEventListener('click', function(event) {
                if (totalSKS > batasSKS) {
                    event.preventDefault();
                    alert('Anda melebihi batas SKS!');
                } else {
                    const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
                    if (checkedCheckboxes.length === 0) {
                        event.preventDefault();
                        alert('Harap pilih setidaknya satu mata kuliah!');
                    }
                }
            });
        });
    </script>
</body>

</html>