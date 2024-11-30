<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Mengubah warna tombol menjadi biru seperti navbar */
        .btn-primary-custom {
            background-color: #003f5c;
            border-color: #003f5c;
            color: white; /* Membuat teks tombol menjadi putih */
        }

        /* Mengubah warna tombol saat hover */
        .btn-primary-custom:hover {
            background-color: #002a42;
            border-color: #002a42;
            color: white; /* Memastikan teks tetap putih saat hover */
        }

        .custom-navbar {
            background-color: #003f5c;
        }

        /* Styling untuk kotak form */
        .form-box {
            background-color: #ffffff; /* Warna latar belakang putih */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan yang lebih kuat */
            border: 1px solid #ddd; /* Menambahkan border tipis berwarna abu-abu terang */
        }

        /* Menambahkan margin untuk form dan label */
        .container-form {
            margin-top: 100px; /* Menambahkan margin atas agar lebih rapih */
            padding: 20px;
        }

        /* Styling untuk judul */
        .form-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md custom-navbar shadow-lg">
        <div class="container">
            <!-- Navbar Brand (SIMPATI) di tengah -->
            <a class="navbar-brand text-white" href="#">
                <strong>SIMPATI</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Form -->
    <div class="container container-form">
        <h1 class="text-center form-title">Pilih Peran</h1>

        <!-- Form dalam kotak -->
        <div class="form-box">
            <form action="{{ route('process.role') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="role">Pilih Peran:</label>
                    <select name="role" id="role" class="form-control" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary-custom w-100">Lanjutkan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
