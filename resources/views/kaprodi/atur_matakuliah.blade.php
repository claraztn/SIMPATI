<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atur Mata Kuliah</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">
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
                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <h4 class="h5 pt-2">Silahkan Atur Mata Kuliah Tiap Program Studi!</h4>
        </div>
        <!-- Form Atur Matakuliah -->
        <div class="card shadow mb-5">
            <div class="card-header text-dark">
                <h5 class="mb-0 text-center">Form Atur Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kaprodi.store-matakuliah') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode_kelas" class="form-label">Kode MK</label>
                                <input type="text" name="kode_mk" id="kode_mk" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kode_kelas" class="form-label">Nama MK</label>
                                <input type="text" name="nama_mk" id="nama_mk" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select name="semester" class="form-select" id="edit-semester">
                                    <option value="">Pilih Semester</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sks" class="form-label">SKS</label>
                                <input type="number" name="sks" id="sks" class="form-control"
                                    min="1" max="4" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sifat" class="form-label">Sifat</label>
                                <select name="sifat" class="form-select" id="sifat">
                                    <option value="">Pilih Sifat</option>
                                    <option value="Wajib">Wajib</option>
                                    <option value="Pilihan">Pilihan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="id_prodi" class="form-label">Program Studi</label>
                                <select name="id_prodi" class="form-select" id="id_prodi">
                                    <option value="">Pilih Prodi</option>
                                    @foreach ($prodi as $item)
                                        <option value={{ $item->id_prodi }}>{{ $item->nama_prodi }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tabel Mata Kuliah Tersimpan -->
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 text-center">Daftar Mata Kuliah Tersimpan</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="text-center table-success">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Sifat</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($mataKuliah as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->kode_mk }} </td>
                                <td>{{ $item->nama_mk }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->sks }}</td>
                                <td>{{ $item->sifat }}</td>
                                <td>{{ $item->programStudi->nama_prodi }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->kode_mk }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('kaprodi.delete-matakuliah', $item->kode_mk) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                            data-nama-matkul="{{ $item->nama_matkul }}"
                                            onclick="return confirmHapus(this)">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<!-- Modal Edit -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.js"></script>

@foreach ($mataKuliah as $item)
    <div class="modal fade" id="editModal{{ $item->kode_mk }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditMataKuliah" action="{{ route('kaprodi.update-matakuliah', $item->kode_mk) }}"
                        method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="edit-kode_mk" class="form-label">Kode MK</label>
                            <input type="text" name="kode_mk" id="edit-kode_mk" class="form-control"
                                value="{{ $item->kode_mk }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-nama_mk" class="form-label">Nama MK</label>
                            <input type="text" name="nama_mk" id="edit-nama_mk" value="{{ $item->nama_mk }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-semester" class="form-label">Semester</label>
                            <input type="number" name="semester" id="edit-semester" value="{{ $item->semester }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-sks" class="form-label">SKS</label>
                            <input type="number" name="sks" id="edit-sks" value="{{ $item->sks }}"
                                class="form-control" min="1" max="4" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-sifat" class="form-label">Sifat</label>
                            <select name="sifat" id="edit-sifat" class="form-select">
                                <option value="Wajib">Wajib</option>
                                <option value="Pilihan">Pilihan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit-id_prodi" class="form-label">Program Studi</label>
                            <select name="id_prodi" id="edit-id_prodi" class="form-select">
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id_prodi }}">{{ $item->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


<script>
    function confirmHapus(button) {
        var namaMK = $(button).data('nama-matkul');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus mata kuliah ' + namaMK + '.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var form = $(button).closest('form');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        var response = xhr.responseJSON;
                        Swal.fire({
                            title: 'Gagal!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });

        return false;
    }
</script>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
