<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>REGISTRASI</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
          .custom-navbar {
              background-color: #003f5c; 
          }
          .btn-fill {
              background-color: #28a745;
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              display: block;
              margin: 20px auto;
              text-align: center;
          }
          .btn-fill:hover {
              background-color: #218838;
          }
          .form-container {
              max-width: 350px; /* Ensure the form width is controlled */
              margin: 5rem auto;
              padding: 20px;
              background-color: #fff;
              border-radius: 10px;
              box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
          }
          label {
              display: block;
              margin-bottom: 10px;
              font-weight: bold;
          }
          select, input {
              width: 100%;
              margin-bottom: 20px;
              padding: 10px;
              border: 1px solid #ccc;
              border-radius: 5px;
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}">Registrasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}">IRS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.detail-irs-khs') }}">Detail IRS & KHS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto"> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello,
                                {{-- Hello, {{ Auth::user()->name }} --}}
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
                  <h3 class="h5 pt-2">FORMULIR REGISTRASI</h3>
              </div>
              <div class="card-body">
                  <div class="form-container">
                      <form action="/submit" method="POST">
                          <label for="nama">Nama</label>
                          <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
                          
                          <label for="nim">NIM</label>
                          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
                          
                          <label for="semester">Semester</label>
                          <select id="semester" name="semester" required>
                              <option value="" disabled selected>Pilih semester</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="1">5</option>
                              <option value="2">6</option>
                              <option value="3">7</option>
                              <option value="4">8</option>
                              <option value="1">9</option>
                              <option value="2">10</option>
                              <option value="3">11</option>
                              <option value="4">12</option>
                              <option value="1">13</option>
                              <option value="2">14</option>
                          </select>
                          <button type="submit" class="btn-fill">Registrasi</button>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>




{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="h3 mb-4">Halaman Registrasi</h1>

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Formulir Registrasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('registrasi.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select class="form-select" id="semester" name="semester" required>
                            <option value="" disabled selected>Pilih semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
