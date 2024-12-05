<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Kaprodi</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .custom-navbar {
            background-color: #003f5c;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        .checkmark {
            height: 25px;
            width: 25px;
            background-color: #d51919;
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
        }

        .custom-checkbox:hover .checkmark {
            background-color: #ccc;
        }

        .custom-checkbox input:checked+.checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked+.checkmark:after {
            display: block;
        }

        .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        .status-irs {
            color: black;
            font-size: 16px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">
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
    <div class="container my-3">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="h3 mb-3">IRS Mahasiswa</h1>
        <div class="row">
            <div class="col-md-3">
                <table class="table table-light table-borderless">
                    <tbody>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>{{ $infoMahasiswa?->nama_mahasiswa }}</td>
                        </tr>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td>{{ $infoMahasiswa?->nim }}</td>
                        </tr>
                        <tr>
                            <td><strong>Semester</strong></td>
                            <td>{{ $infoMahasiswa?->statusAkademik->current_semester }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table class="table table-light table-borderless">
                    <tbody>
                        <tr>
                            <td><strong>IPS/IPK</strong></td>
                            <td>{{ $infoMahasiswa?->statusAkademik->ipk_komulatif }} /</td>
                        </tr>
                        <tr>
                            <td><strong>Maks SKS</strong></td>
                            <td>{{ $infoMahasiswa?->statusAkademik->batas_sks }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah SKS</strong></td>
                            <td>{{ $jmlsks }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="status-irs mb-2">
                @if ($statusVerifikasi == 0)
                    <span class="badge bg-danger p-2 fs-6">
                        Status: Belum Disetujui
                    </span>
                @else
                    <span class="badge bg-primary p-2 fs-6">
                        Status: Sudah disetujui
                    </span>
                @endif


            </div>

        </div>


        <!-- Tabel Verifikasi Jadwal -->
        <div class="card shadow mb-5">

            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-primary">
                        <tr>
                            <th>No.</th>
                            <th>KODE MK </th>
                            <th>NAMA MK</th>
                            <th>SKS</th>
                            <th>HARI, JAM, RUANG KELAS</th>
                            <th>DOSEN PENGAMPU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($getIRSDetail as $item)
                            <tr class="text-center">
                                <td> {{ $i++ }}</td>
                                <td> {{ $item->kode_mk }}</td>
                                <td> {{ $item->mataKuliah->nama_mk }}</td>
                                <td> {{ $item->mataKuliah->sks }}</td>
                                <td> {{ $item->hari }}, {{ $item->jam_mulai }} - {{ $item->jam_selesai }} </td>
                                <td>
                                    @if ($item->mataKuliah->dosenMataKuliah->isNotEmpty())
                                        @foreach ($item->mataKuliah->dosenMataKuliah as $dosen)
                                            <div>{{ $dosen->dosen->nama_dosen }}</div>
                                        @endforeach
                                    @else
                                        <div>Dosen N/A</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <div class="total-sks">
                        <span class="badge p-3 bg-secondary fs-6">Total SKS: {{ $jmlsks }} SKS</span>
                    </div>
                    @if ($statusVerifikasi == 0)
                        <div class="konfirmasi">
                            <button id="accBtn" class="btn btn-primary">SETUJU</button>
                            <button id="declineBtn" class="btn btn-danger">TOLAK</button>
                        </div>
                    @endif
                </div>
            </div>

        </div>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.js"></script>

        <script>
            document.getElementById('accBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyetujui tindakan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setuju',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const irsId = {{ $idIrs }}

                        // pake AJAX request
                        fetch('/pembimbing-akademik/irs-verifikasi', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content')
                                },
                                body: JSON.stringify({
                                    id: irsId,
                                    isVerified: true
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.fire(
                                    'Tindakan Disetujui!',
                                    'IRS telah diverifikasi.',
                                    'success'
                                );
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Terjadi Kesalahan',
                                    'Gagal memperbarui status IRS.',
                                    'error'
                                );
                            });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Tindakan Dibatalkan',
                            'Anda membatalkan tindakan.',
                            'error'
                        );
                    }
                });
            });
        </script>
</body>

</html>