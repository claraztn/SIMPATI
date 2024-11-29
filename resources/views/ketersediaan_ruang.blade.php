<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>KETERSEDIAAN RUANG KELAS</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
          .custom-navbar {
              background-color: #003f5c; 
          }
          .btn-fill {
              background-color: #00bfff; /* Warna biru muda */
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              margin-right: 10px;
          }
          .btn-history {
              background-color: #003f5c; /* Warna biru tua */
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              margin-right: 10px;
          }
          .btn-fill:hover {
              background-color: #002a42; /* Warna hover untuk tombol Pengisian */
          }
          .btn-history:hover {
              background-color: #002a42; /* Warna hover untuk tombol Riwayat Pengisian */
          }
          .btn-fill.btn-active, .btn-history.btn-active {
              background-color: #002a42; /* Warna aktif biru tua */
              color: white;
          }

          .form-container {
              max-width: 100%;
              max-height: 400px; /* Fixed height for scrolling */
              margin: 5px auto;
              padding: 5px;
              background-color: #fff;
              border-radius: 10px;
              box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.1);
              overflow-y: auto; /* Enable scrolling */
          }
          label, select, input {
              display: block;
              width: 100%;
              margin: 10px 0;
              padding: 10px;
          }
          label {
              text-align: center;
          }
          .btn-save {
              background-color: #28a745;
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              width: 100%;
              margin-top: 20px;
          }
          .btn-save:hover {
              background-color: #218838;
          }
          .navbar-nav .nav-item .nav-link {
              color: white;
              text-decoration: none;
          }

          .navbar-nav .nav-item .nav-link:hover {
              text-decoration: underline;
          }

          .navbar-nav .nav-item.active .nav-link {
              text-decoration: underline;
              color: white;
          }

          .btn-submit {
              background-color: #FF5722; /* Orange color */
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              position: fixed; /* Fix button position at the bottom right */
              bottom: 20px;
              right: 20px;
          }

          .btn-submit:hover {
              background-color: #e64a19;
          }

          table {
              width: 100%;
              border-collapse: collapse;
          }

          table th, table td {
              padding: 12px;
              text-align: center;
              border: 1px solid #ddd;
          }

          table th {
              background-color: #f8f9fa;
          }

          table td a {
              padding: 5px 10px;
              color: white;
              border-radius: 5px;
          }

        /* Edit button (yellow) */
        .btn-edit {
            background-color: #ffc107;  /* Kuning untuk Edit */
            color: white;
            padding: 5px 10px; /* Ukuran tombol lebih kecil */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-right: 10px;
            font-size: 14px; /* Ukuran font lebih kecil */
            text-decoration: none; 
        }

        .btn-edit:hover {
            background-color: #e0a800; /* Kuning lebih gelap saat hover */
        }

        /* Delete button (red) */
        .btn-delete {
            background-color: #dc3545;  /* Merah untuk Hapus */
            color: white;
            padding: 5px 10px; /* Ukuran tombol lebih kecil */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            font-size: 14px; /* Ukuran font lebih kecil */
        }

        .btn-delete:hover {
            background-color: #c82333; /* Merah lebih gelap saat hover */
        }

        /* Umum untuk tombol aksi */
        .btn-action {
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .btn-action:hover {
            opacity: 0.8;  /* Efek hover untuk tombol */
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
                            <li class="nav-item {{ request()->routeIs('bagianAkademik.manajemen_ruang') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('bagianAkademik.manajemen_ruang') }}">
                                    Manajemen Ruang
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto"> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
      
        @if(session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif

        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif

        <div class="container">
            <div class="card border-0 shadow my-5">
                <div class="card-header bg-light">
                    <h3 class="h5 pt-2">KETERSEDIAAN RUANG KELAS</h3>
                </div>
                <div class="card-body">
                    <div class="button-container" style="margin-bottom: 20px;">
                        <button class="btn-fill {{ request()->routeIs('bagianAkademik.manajemen_ruang') ? 'active' : '' }}" 
                            onclick="window.location.href='{{ route('bagianAkademik.manajemen_ruang') }}'">Pengisian
                        </button>
                        <button class="btn-history {{ request()->routeIs('ketersediaan_ruang') ? 'active' : '' }}" 
                            onclick="window.location.href='{{ route('ketersediaan_ruang') }}'">Riwayat Pengisian
                        </button>                                
                </div>
                <div class="form-container">
                    <table>
                      <thead>
                          <tr>
                              <th>Gedung</th>
                              <th>Nama Ruang</th>
                              <th>Kapasitas Ruang</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($ruangs as $ruang)
                              <tr>
                                  <td>{{ $ruang->gedung }}</td>
                                  <td>{{ $ruang->nama_ruang }}</td>
                                  <td>{{ $ruang->kapasitas }}</td>
                                  <td>
                                    <!-- Edit button -->
                                    <a href="{{ route('bagianAkademik.manajemen_ruang') }}" class="btn-action btn-edit">Edit</a>
                                
                                    <!-- Delete button -->
                                    <form action="{{ route('ruangan.hapus', $ruang->id_ruang) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" 
                                            data-nama-ruang="{{ $ruang->nama_ruang }}" 
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
        </div>
        
        <a href="#" class="btn-submit">AJUKAN KE DEKAN</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#gedung').change(function() {
                    var gedung = $(this).val();
                    $('#namaRuang').empty(); 
                    $('#kapasitas').val('');
                    
                    if (gedung) {
                        $.ajax({
                            url: '/ruangan/gedung',
                            type: 'GET',
                            data: { gedung: gedung },
                            success: function(data) {
                                $('#namaRuang').append('<option value="">--Pilih Nama Ruang--</option>');
                                $.each(data, function(key, value) {
                                    $('#namaRuang').append('<option value="' + value.nama_ruang + '" data-kapasitas="' + value.kapasitas_ruang + '">' + value.nama_ruang + '</option>');
                                });
                            }
                        });
                    }
                });

                $('#namaRuang').change(function() {
                    var selectedOption = $(this).find(':selected');
                    var kapasitas = selectedOption.data('kapasitas');
                    $('#kapasitas').attr('max', kapasitas);
                    $('#kapasitas').val('');
                });
            });

        function confirmHapus(button) {
            var namaRuang = $(button).data('nama-ruang');
            var confirmMessage = 'Apakah Anda yakin ingin menghapus ruang ' + namaRuang + '?';
            return confirm(confirmMessage);
        }

        </script>
    </body>
</html>

