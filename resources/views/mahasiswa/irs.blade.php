<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>MANAJEMEN RUANG KELAS</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
          .custom-navbar {
              background-color: #003f5c; 
          }
          .btn-fill, .btn-history {
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
          .btn-fill:hover, .btn-history:hover {
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
          label, select, input {
              display: block;
              width: 100%;
              margin: 10px 0;
              padding: 10px;
          }
          label {
              text-align: center; /* Center the text inside the label */
          }
          .btn-save {
              background-color: #28a745; /* Green color */
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              width: 100%; /* Make it full-width */
              margin-top: 20px;
          }
          .btn-save:hover {
              background-color: #218838; /* Darker green on hover */
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

          /* Active link: underline stays when the link is active */
          .navbar-nav .nav-item.active .nav-link {
              text-decoration: underline;
              color: white; /* Ensure text color stays white */
          }
      </style>
   </head>
   <body class="bg-light">
        <nav class="navbar navbar-expand-md custom-navbar shadow-lg">
            <div class="container">
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
                    <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <!-- Menu Home -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" style="text-decoration: none;">Home</a>
                        </li>
                        <!-- Menu IRS -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}" style="text-decoration: none;">IRS</a>
                        </li>
                        <!-- Menu Registrasi -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}" style="text-decoration: none;">Registrasi</a>
                        </li>
                    </ul>
                        <ul class="navbar-nav ms-auto"> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, {{ Auth::user()->name }}
                                    
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
        
        <div class="container">
            <div class="card border-0 shadow my-5">
              <div class="card-header bg-light">
                  <h3 class="h5 pt-2">MANAJEMEN RUANG KELAS</h3>
              </div>
              <div class="card-body">
                <div class="button-container" style="margin-bottom: 20px;">
                    <button class="btn-fill" onclick="window.location.href='{{ route('mahasiswa.irs') }}'">BUAT IRS</button>
                    {{-- <button class="btn-history" onclick="window.location.href='{{ route('ketersediaan_ruang') }}'">Riwayat Pengisian</button> --}}
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        {{-- <h5 class="card-title">BUAT IRS</h5> --}}
                        <p class="mb-0">IPS: <strong>3.50</strong></p>
                        <p class="mb-0">IPK: <strong>3.70</strong></p>
                        <p class="mb-0">Semester: <strong>5</strong></p>
                        <p>Total SKS yang dapat diambil: <strong>30 SKS</strong></p>
                    </div>
                </div>
                {{-- < method="POST" action="{{ route('irs.submit') }}"> --}}
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
                </div>
            </div>
        </div>
    </body>
</html>

{{-- <!doctype html>
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
</html> --}}
