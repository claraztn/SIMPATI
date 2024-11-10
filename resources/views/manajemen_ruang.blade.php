<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagian Akademik</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
    body, h1, h2, h3, h4, h5 { font-family: "Poppins", sans-serif; }
    body { font-size: 16px; }

    /* Header */
    .w3-header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    /* Main content */
    .w3-main {
      margin-top: 40px;
      padding: 25px;
      background-color: #eaeaead1;
      transition: margin-left 0.3s ease;
      margin-left: 0;
      width: calc(100% - 0);
    }

    /* Sidebar */
    .w3-sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 280px;
      height: 100%;
      background-color: #333;
      color: white;
      padding-top: 60px;
      transition: transform 0.3s ease;
      transform: translateX(-100%);
    }

    /* Colors */
    .w3-marina { background-color: #003f5c; color: white; }
    .btn-save { background-color: green; color: white; border-radius: 5px; padding: 10px 20px; text-decoration: none; }
    .btn-save:hover { background-color: #90ee90; }

    /* Sidebar visibility */
    .w3-sidebar-visible { transform: translateX(0); }

    /* Profile section */
    .profile-section { text-align: center; margin: 20px 0; }
    .btn-profile { background-color: #ff5722; color: white; padding: 10px 20px; border-radius: 5px; }
    .btn-profile:hover { background-color: #e64a19; }

    .profile-image { width: 150px; height: 150px; }

    /* Form styling */
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    label, select, input {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 10px;
    }

    /* Sidebar and main content toggle */
    .btn-submit {
      background-color: green; color: white; border-radius: 5px; padding: 10px 20px; position: fixed;
      bottom: 20px; right: 20px; text-decoration: none;
    }
    .btn-submit:hover { background-color: #90ee90; }

    /* Button Styling for Pengisian and Riwayat Pengisian */
    .btn-fill {
      background-color: #003f5c; /* Biru tua */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
      cursor: pointer;
    }

    .btn-history {
      background-color: #00bfff; /* Biru muda */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Hover efek */
    .btn-fill:hover {
      background-color: #002a42;
    }

    .btn-history:hover {
      background-color: #87cefa;
    }

    /* Form title styling */
    .form-title {
      text-align: center;
      margin-top: 20px;
      color: #003f5c; /* Biru tua untuk judul form */
    }

  </style>
</head>
<body>

<!-- Navbar -->
<header class="w3-container w3-marina w3-large w3-header">
  <a href="#" class="w3-button w3-margin-right" onclick="toggleSidebar()">☰</a>
  <a href="{{ route('dashboard2') }}" class="w3-button w3-margin-right" style="text-decoration: none;">Back to Menu</a>
</header>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-dark-gray w3-large" id="mySidebar">
  <br><br>
  <div class="profile-section">
    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w3-circle profile-image">
    <br>
    <br>
    <a href="#" class="btn-profile">Lihat Profil</a>
  </div>
  <br>
  <div class="w3-bar-block">
    <a href="{{ route('dashboard2') }}" class="w3-bar-item w3-button w3-hover-white">Dashboard</a> 
    <a href="{{ route('manajemen_ruang') }}" class="w3-bar-item w3-button w3-hover-white">Manajemen Ruang</a> 
  </div>
</nav>

<!-- Main Content -->
<div class="w3-main" id="mainContent">

  <!-- Tombol Pengisian dan Riwayat Pengisian -->
  <div class="button-container" style="margin-bottom: 20px;">
    <button class="btn-fill" onclick="window.location.href='{{ route('manajemen_ruang') }}'">Pengisian</button>
    <button class="btn-history" onclick="window.location.href='{{ route('ketersediaan_ruang') }}'">Riwayat Pengisian</button>
  </div>

  <!-- Form Pengisian -->
  <h3 class="w3-text-gray form-title"><b>MANAJEMEN RUANG KELAS</b></h3>
  <div class="form-container">
    <form action="{{ route('ruangan.aturKapasitas') }}" method="POST">
      @csrf
      <label for="gedung">Pilih Gedung:</label>
      <select id="gedung" name="gedung" required>
        <option value="">--Pilih Gedung--</option>
        @foreach($ruangan->unique('gedung') as $item) <!-- Mengambil gedung yang unik -->
          <option value="{{ $item->gedung }}">{{ $item->gedung }}</option>
        @endforeach
      </select>

      <!-- Nama Ruang -->
      <label for="namaRuang">Nama Ruang:</label>
      <select id="namaRuang" name="namaRuang" required>
        <option value="">--Pilih Nama Ruang--</option>
      </select>

      <!-- Kapasitas Ruang -->
      <label for="kapasitas">Kapasitas:</label>
      <input type="number" id="kapasitas" name="kapasitas" required min="1" />

      <button type="submit" class="btn-save">Simpan</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#gedung').change(function() {
      var gedung = $(this).val();
      $('#namaRuang').empty(); // Kosongkan dropdown nama ruang
      $('#kapasitas').val(''); // Reset input kapasitas
      $('#maxKapasitasLabel').hide(); // Sembunyikan label kapasitas maksimum

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
      $('#kapasitas').attr('max', kapasitas); // Set batas maksimum kapasitas
      $('#kapasitas').val(''); // Reset input kapasitas
  });
});

let isSidebarOpen = false;

function toggleSidebar() {
  const sidebar = document.getElementById("mySidebar");
  const mainContent = document.getElementById("mainContent");

  if (isSidebarOpen) {
    sidebar.classList.remove("w3-sidebar-visible"); // Hide sidebar
    mainContent.style.marginLeft = "0"; // Reset main content margin
  } else {
    sidebar.classList.add("w3-sidebar-visible"); // Show sidebar
    mainContent.style.marginLeft = "280px"; // Adjust main content for sidebar width
  }

  isSidebarOpen = !isSidebarOpen;
}

</script>
</body>
</html>
