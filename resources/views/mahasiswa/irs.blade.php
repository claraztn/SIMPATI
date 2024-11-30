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
                            <a class="nav-link text-white" href="{{ route('mahasiswa.dashboard') }}" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}" style="text-decoration: none;">Registrasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}" style="text-decoration: none;">IRS</a>
                        </li>
                    </ul>
                        <ul class="navbar-nav ms-auto"> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello,
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
                    <h3 class="h5 pt-2">IRS MAHASISWA</h3>
                </div>
                <div class="card-body">
                    <div class="button-container">
                        <button class="btn-fill" onclick="window.location.href='{{ route('mahasiswa.irs') }}'">Buat IRS</button>
                        <button class="btn-fill" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Detail
                            <i class="fas fa-chevron-down"></i>  <!-- Ikon panah Font Awesome -->
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" onclick="showContent('irs')">IRS</a></li>
                            <li><a class="dropdown-item" href="#" onclick="showContent('khs')">KHS</a></li>
                            <li><a class="dropdown-item" href="#" onclick="showContent('transkrip')">Transkrip</a></li>
                        </ul>
                    </div>

                    <!-- Tabel Mata Kuliah -->
                    <div class="card shadow mb-4">
                        <form method="POST" action="{{ route('irs.submit') }}">
                            @csrf
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
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>MK101</td>
                                                <td>Matematika Dasar</td>
                                                <td>Senin, 08:00 - 10:00</td>
                                                <td>Ruangan A101</td>
                                                <td>Semester 5</td>
                                                <td>3</td>
                                                <td>Dr. A</td>
                                                <td><input type="checkbox" name="mk1"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>MK102</td>
                                                <td>Fisika Dasar</td>
                                                <td>Selasa, 10:00 - 12:00</td>
                                                <td>Ruangan B202</td>
                                                <td>Semester 5</td>
                                                <td>3</td>
                                                <td>Prof. B</td>
                                                <td><input type="checkbox" name="mk2"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button class="btn-save" type="submit">Simpan</button>
                        </form>
                    </div>


                    <!-- Accordion for IRS, KHS, and Transkrip -->
                    <div id="accordion" class="accordion">
                        <!-- IRS Accordion -->
                        <div class="accordion-item" id="irsAccordion" style="display: none;">
                            <h5>Isian Rencana Studi(IRS)</h5>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIRS1" aria-expanded="false" aria-controls="collapseIRS1">
                                    IRS Semester 1
                                </button>
                            </div>
                            <div id="collapseIRS1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Form IRS Semester 1 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                    IRS Semester 2
                                </button>
                            </div>
                            <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Form IRS Semester 2 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIRS3" aria-expanded="false" aria-controls="collapseIRS3">
                                    IRS Semester 3
                                </button>
                            </div>
                            <div id="collapseIRS3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Form IRS Semester 3 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                    IRS Semester 4
                                </button>
                            </div>
                            <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Form IRS Semester 4 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                    IRS Semester 5
                                </button>
                            </div>
                            <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Form IRS Semester 5 content goes here...</p>
                                </div>
                            </div>
                        </div>

                        <!-- KHS Accordion -->
                        <div class="accordion-item" id="khsAccordion" style="display: none;">
                            <h5>Kartu Hasil Studi(KHS)</h5>
                            <!-- Add KHS specific content here -->
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                                    KHS Semester 1
                                </button>
                            </div>
                            <div id="collapseKHS" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>KHS Semester 1 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                                    KHS Semester 2
                                </button>
                            </div>
                            <div id="collapseKHS" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>KHS Semester 2 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                                    KHS Semester 3
                                </button>
                            </div>
                            <div id="collapseKHS" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>KHS Semester 3 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                                    KHS Semester 4
                                </button>
                            </div>
                            <div id="collapseKHS" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>KHS Semester 4 content goes here...</p>
                                </div>
                            </div>
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                                    KHS Semester 5
                                </button>
                            </div>
                            <div id="collapseKHS" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>KHS Semester 5 content goes here...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Transkrip Accordion -->
                        <div class="accordion-item" id="transkripAccordion" style="display: none;">
                            <h5>Transkrip Nilai</h5>
                            <!-- Add Transkrip specific content here -->
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTranskrip" aria-expanded="false" aria-controls="collapseTranskrip">
                                    Transkrip Nilai
                                </button>
                            </div>
                            <div id="collapseTranskrip" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>Transkrip Nilai content goes here...</p>
                                </div>
                            </div>
                        </div>
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
            document.getElementById('matkulTable').closest('div').style.display = 'none'; // Hide the parent div of the table
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
        </script>            
    </body>
</html>
