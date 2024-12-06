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
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}">Registrasi</a>
                        </li> --}}
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
                        </div>
                        <div class="info">
                            <h6 id="totalSks" class="me-5 text-primary">Maks. SKS anda: {{ $batasSKS }} </h6>
                            @if ($irs)
                                <h6 class="me-5">Total SKS diajukan: <span id="totalPilih"
                                        class="h5">{{ $irs->jmlsks }}</span>
                                </h6>
                            @else
                                <h6 class="me-5">Total SKS dipilih: <span id="totalPilih" class="h5">0</span>
                                </h6>
                            @endif
                        </div>
                    </div>



                </div>

                <!-- Tabel Mata Kuliah -->
                <div class="card shadow mb-4">
                    <form method="POST" id="formIRS" action="{{ route('irs.submit') }}">
                        @csrf
                        <input hidden name="total_sks" id="total_sks" value="0">

                        <div class="card shadow">
                            <div class="card-header">
                                <h6 class="mb-0">Daftar Mata Kuliah</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="matkulTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                                    <input type="checkbox" class="sks-checkbox"
                                                        data-sks="{{ $item->mataKuliah->sks }}"
                                                        data-kode="{{ $item->kode_mk }}"
                                                        data-hari="{{ $item->hari }}"
                                                        data-mulai="{{ $item->jam_mulai }}"
                                                        data-selesai="{{ $item->jam_selesai }}"
                                                        data-ruang="{{ $item->id_ruang }}">
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    Tidak ada jadwal kuliah ditemukan.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($irs)
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
        function showContent(type) {
            // Sembunyikan semua bagian Accordion
            document.getElementById('irsAccordion').style.display = 'none';
            document.getElementById('khsAccordion').style.display = 'none';
            document.getElementById('transkripAccordion').style.display = 'none';

            // Sembunyikan Tabel Mata Kuliah dan Button Simpan
            document.getElementById('matkulTable').closest('div').style.display =
                'none'; // Hide the parent div of the table
            document.querySelector('button.btn-save').style.display = 'none';

            // Menampilkan konten yang dipilih
            if (type === 'irs') {
                document.getElementById('irsAccordion').style.display = 'block';
            } else if (type === 'khs') {
                document.getElementById('khsAccordion').style.display = 'block';
            } else if (type === 'transkrip') {
                document.getElementById('transkripAccordion').style.display = 'block';
            }
        }

        function showTable() {
            // Menampilkan Tabel Mata Kuliah dan Button Simpan
            document.getElementById('matkulTable').closest('div').style.display = 'block';
            document.querySelector('button.btn-save').style.display = 'block';

            // Menyembunyikan bagian Accordion ketika "Buat IRS" diklik
            document.getElementById('irsAccordion').style.display = 'none';
            document.getElementById('khsAccordion').style.display = 'none';
            document.getElementById('transkripAccordion').style.display = 'none';
        }



        // UNTUK PENGECEKAN batas SKS melebih atau tidak ketika di submit.
        // klo melebihi, gagal kan.
        document.addEventListener('DOMContentLoaded', function() {

            const batasSKS = parseInt('{{ $batasSKS }}');

            const checkboxes = document.querySelectorAll('.sks-checkbox');
            const totalPilihElement = document.getElementById('totalPilih');
            const btnSave = document.getElementById('btnSave');

            let totalSKS = 0;
            let selectedKodeMk = [];

            // script buat ngehandle perubahan checkbox tiap item list jdwal
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const sks = parseInt(this.getAttribute('data-sks'));

                    // ambil informasi SECARA DETAIL, jadwal yg diambil di hari, ruang dan mk yg mana
                    const kodeMk = this.getAttribute('data-kode');
                    const hari = this.getAttribute('data-hari');
                    const mulai = this.getAttribute('data-mulai');
                    const selesai = this.getAttribute('data-selesai');
                    const ruang = this.getAttribute('data-ruang');

                    // checkbox dicentang => tambahkan SKS dan kode_mk ke array
                    if (this.checked) {
                        totalSKS += sks;
                        selectedKodeMk.push(kodeMk);

                        // mapping buat tiap item yg di ceklis masuk ke array
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'kode_mk[]';
                        input.value = kodeMk;
                        document.forms[0].appendChild(input);

                        const inputHari = document.createElement('input');
                        inputHari.type = 'hidden';
                        inputHari.name = 'hari[]';
                        inputHari.value = hari;
                        document.forms[0].appendChild(inputHari);

                        const inputMulai = document.createElement('input');
                        inputMulai.type = 'hidden';
                        inputMulai.name = 'jam_mulai[]';
                        inputMulai.value = mulai;
                        document.forms[0].appendChild(inputMulai);

                        const inputSelesai = document.createElement('input');
                        inputSelesai.type = 'hidden';
                        inputSelesai.name = 'jam_selesai[]';
                        inputSelesai.value = selesai;
                        document.forms[0].appendChild(inputSelesai);

                        const inputRuang = document.createElement('input');
                        inputRuang.type = 'hidden';
                        inputRuang.name = 'ruang[]';
                        inputRuang.value = ruang;
                        document.forms[0].appendChild(inputRuang);
                    } else {
                        // kurangi SKS, hapus kode_mk dari array
                        totalSKS -= sks;
                        const index = selectedKodeMk.indexOf(kodeMk);
                        if (index !== -1) {
                            selectedKodeMk.splice(index, 1);
                        }


                        // hapus input hidden untuk kode_mk yang di uncheck
                        const inputs = document.querySelectorAll(`input[name="kode_mk[]"]`);
                        inputs.forEach(input => {
                            if (input.value === kodeMk) {
                                input.remove();
                            }
                        });
                        const inputsHari = document.querySelectorAll(`input[name="hari[]"]`);
                        inputsHari.forEach(input => {
                            if (input.value === hari) {
                                input.remove();
                            }
                        });

                        const inputsMulai = document.querySelectorAll(`input[name="jam_mulai[]"]`);
                        inputsMulai.forEach(input => {
                            if (input.value === mulai) {
                                input.remove();
                            }
                        });

                        const inputsSelesai = document.querySelectorAll(
                            `input[name="jam_selesai[]"]`);
                        inputsSelesai.forEach(input => {
                            if (input.value === selesai) {
                                input.remove();
                            }
                        });

                        const inputsRuang = document.querySelectorAll(`input[name="ruang[]"]`);
                        inputsRuang.forEach(input => {
                            if (input.value === ruang) {
                                input.remove();
                            }
                        });
                    }

                    // Update total SKS
                    totalPilihElement.textContent = totalSKS;
                    document.getElementById('total_sks').value = totalSKS;
                });
            });

            // ps mau submit cek apakah total SKS melebihi batas saat tombol simpan diklik
            btnSave.addEventListener('click', function(event) {
                if (totalSKS > batasSKS) {
                    event.preventDefault();
                    alert('Anda melebihi batas SKS!'); // alert.
                }
            });
        });
    </script>
</body>

</html>