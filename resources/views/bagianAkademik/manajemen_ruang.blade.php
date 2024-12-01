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
                            <a class="nav-link" href="{{ route('bagianAkademik.dashboard') }}" style="color: white;">
                                Home
                            </a>                            
                        <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item {{ request()->routeIs('bagianAkademik.manajemen_ruang') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('bagianAkademik.manajemen_ruang') }}">
                                    Manajemen Ruang
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto"> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, siapa namanya
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
                    <h3 class="h5 pt-2">MANAJEMEN RUANG KELAS</h3>
                </div>
                <div class="card-body">
                    <div class="button-container" style="margin-bottom: 20px;">
                        <button class="btn-fill" onclick="window.location.href='{{ route('bagianAkademik.manajemen_ruang') }}'">Pengisian</button>
                        <button class="btn-history" onclick="window.location.href='{{ route('ketersediaan_ruang') }}'">Riwayat Pengisian</button>
                    </div>

                <!-- Form to configure room capacity -->
                <div class="form-container mt-4">
                    <form action="{{ route('ruangan.aturKapasitas') }}" method="POST">
                        @csrf

                        <!-- "Pilih Prodi" Field -->
                        <label for="prodi">Pilih Prodi:</label>
                        <select id="prodi" name="prodi" required>
                            <option value="">--Pilih Prodi--</option>
                            @foreach($prodi as $item)
                                <option value="{{ $item->id_prodi }}">{{ $item->nama_prodi }}</option>
                            @endforeach
                        </select>

                        <!-- "Pilih Gedung" Field -->
                        <label for="gedung">Pilih Gedung:</label>
                        <select id="gedung" name="gedung" required>
                            <option value="">--Pilih Gedung--</option>
                            @foreach($ruangan->unique('gedung') as $item)
                                <option value="{{ $item->gedung }}">{{ $item->gedung }}</option>
                            @endforeach
                        </select>

                        <!-- "Nama Ruang" Field -->
                        <label for="namaRuang">Nama Ruang:</label>
                        <select id="namaRuang" name="namaRuang" required>
                            <option value="">--Pilih Nama Ruang--</option>
                        </select>

                        <!-- "Kapasitas" Field -->
                        <label for="kapasitas">Kapasitas:</label>
                        <input type="number" id="kapasitas" name="kapasitas" required min="1" />

                        <!-- Submit Button -->
                        <button type="submit" class="btn-save">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
           

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            // Ketika gedung dipilih
            $('#gedung').change(function() {
                var gedung = $(this).val();
                $('#namaRuang').empty();  // Kosongkan dropdown nama ruang
                $('#kapasitas').val('');  // Kosongkan input kapasitas

                if (gedung) {
                    $.ajax({
                        url: '{{ route("ruangan.getRuanganByGedung") }}',  // Pastikan URL sesuai dengan route yang ada
                        type: 'GET',
                        data: { gedung: gedung },
                        success: function(data) {
                            $('#namaRuang').append('<option value="">--Pilih Nama Ruang--</option>');
                            // Isi dropdown nama ruang dengan data yang diterima
                            $.each(data, function(key, value) {
                                $('#namaRuang').append('<option value="' + value.nama_ruang + '" data-kapasitas="' + value.kapasitas_ruang + '">' + value.nama_ruang + '</option>');
                            });
                        },
                        error: function() {
                            alert('Gagal mengambil data ruangan.');
                        }
                    });
                }
            });

            // Ketika nama ruang dipilih
            $('#namaRuang').change(function() {
                var selectedOption = $(this).find(':selected');
                var kapasitas = selectedOption.data('kapasitas');
                $('#kapasitas').attr('max', kapasitas);  // Set kapasitas maksimal berdasarkan ruang yang dipilih
                $('#kapasitas').val('');  // Kosongkan input kapasitas
            });
        });
        </script>
    </body>
</html>
