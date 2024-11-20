<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat IRS</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .profile-header {
            background-color: #003f5c;
            color: white;
        }
        .table-header {
            background-color: #f1f1f1;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <!-- Header -->
        <div class="card shadow mb-4">
            <div class="card-body profile-header p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Kaifano Zylanda</h5>
                        <p class="mb-0">Sastra Mesin - 2022</p>
                    </div>
                    <div>
                        <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">BUAT IRS</h5>
                <p class="mb-0">IPS: <strong>3.50</strong></p>
                <p class="mb-0">IPK: <strong>3.70</strong></p>
                <p class="mb-0">Semester: <strong>5</strong></p>
                <p>Total SKS yang dapat diambil: <strong>30 SKS</strong></p>
            </div>
        </div>

        <!-- Tabel -->
        <form method="POST" action="{{ route('irs.submit') }}">
            @csrf
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">Daftar Mata Kuliah</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr class="table-header">
                                <th>No</th>
                                <th>Kode MK</th>
                                <th>Nama MK</th>
                                <th>Hari & Jam</th>
                                <th>Ruang</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Dosen</th>
                                <th>Pengambilan ke</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mataKuliah as $index => $mk)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $mk->kode_mk }}</td>
                                    <td>{{ $mk->nama_mk }}</td>
                                    <td>{{ $mk->hari }}, {{ $mk->jam_mulai }}-{{ $mk->jam_selesai }}</td>
                                    <td>{{ $mk->ruang }}</td>
                                    <td class="text-center">{{ $mk->semester }}</td>
                                    <td class="text-center">{{ $mk->sks }}</td>
                                    <td>{{ $mk->dosen }}</td>
                                    <td class="text-center">{{ $mk->pengambilan_ke }}/50</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="mata_kuliah[]" value="{{ $mk->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Simpan IRS</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
