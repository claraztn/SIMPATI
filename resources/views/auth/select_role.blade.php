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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pilih Peran</h1>
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
</body>
</html>
