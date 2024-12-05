<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Program Studi</title>
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
            <button onclick="history.back()" class="btn btn-link text-white me-3">
                <i class="bi bi-arrow-left-circle"></i>
            </button>

            <a class="navbar-brand text-white" href="#">SIMPATI</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/verifikasi-ruangan">Verifikasi Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/dekan/verifikasi-jadwal">Verifikasi Jadwal</a>
                    </li>
                </ul>
                <span class="navbar-text text-white">Hello, Dekan</span>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="h3 mb-4 text-center">Pilih Program Studi untuk Verifikasi Jadwal</h1>

        <div class="card shadow mb-5">
            <div class="card-body">
                <form method="GET" action="{{ route('verifikasi-jadwal-prodi', ['id_prodi' => '']) }}">
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Pilih Program Studi</label>
                        <select class="form-select" id="prodi" name="id_prodi" required>
                            <option value="" selected disabled>Pilih Program Studi</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
