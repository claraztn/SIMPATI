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

    /* CSS for header */
    .w3-header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    /* Main content style */
    .w3-main {
      margin-top: 40px; /* Ensure main content starts below the navbar */
      padding: 25px;
      background-color: #eaeaead1; /* Background color of the main content */
      transition: margin-left 0.3s ease;
      margin-left: 0; /* Default margin for main content */
      width: calc(100% - 0); /* Full width minus sidebar */
    }

    /* Sidebar style */
    .w3-sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 280px; /* Width of the sidebar */
      height: 100%;
      background-color: #333;
      color: white;
      padding-top: 60px;
      transition: transform 0.3s ease;
      transform: translateX(-100%); /* Hide sidebar initially */
    }

    /* Custom marina color for navbar */
    .w3-marina {
      background-color: #003f5c;
      color: white;
    }

    /* Show sidebar when toggled */
    .w3-sidebar-visible {
      transform: translateX(0);
    }

    /* Profile section styling */
    .profile-section {
      text-align: center;
      margin: 20px 0;
    }

    .btn-profile {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ff5722; /* Button color */
      color: white; /* Button text color */
      border-radius: 5px; /* Rounded corners */
      text-decoration: none; /* Remove underline */
      transition: background-color 0.3s ease; /* Smooth background transition */
    }

    .btn-profile:hover {
      background-color: #e64a19; /* Darker shade on hover */
    }
    
    .profile-image {
      width: 150px; /* Set the desired width */
      height: 150px; /* Set the desired height */
    }

    /* Styles for the table */
    table {
      margin: 20px 0; /* Adds vertical space above and below the table */
      width: 100%; /* Makes the table full width */
      border-collapse: collapse; /* Merges table borders */
    }

    th, td {
      padding: 10px; /* Adds space inside table cells */
      text-align: left; /* Align text to the left */
      border: 1px solid #ddd; /* Optional: Add border to cells */
    }

    /* Button styles */
    .btn-action {
      display: inline-block;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      text-align: center;
      line-height: 30px;
      margin: 0 5px;
      font-size: 14px;
      color: white;
    }

    .btn-edit {
      background-color: yellow; /* Yellow for edit */
    }

    .btn-delete {
      background-color: red; /* Red for delete */
    }

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

    /* Ajukan button */
    .btn-submit {
      display: inline-block;
      padding: 10px 20px;
      background-color: #f79b2b; /* Button color */
      color: black; /* Button text color */
      border-radius: 5px; /* Rounded corners */
      text-decoration: none; /* Remove underline */
      transition: background-color 0.3s ease; /* Smooth background transition */
      position: fixed; /* Fix position */
      bottom: 20px; /* Distance from bottom */
      right: 20px; /* Distance from right */
    }

    .btn-submit:hover {
      background-color: #9a794a; /* Darker shade on hover */
    }
  </style>
</head>
<body>

<!-- Navbar -->
<header class="w3-container w3-marina w3-large w3-header">
  <a href="javascript:void(0)" class="w3-button w3-margin-right" onclick="toggleSidebar()">☰</a>
  <a href="{{ route('dashboard') }}" class="w3-button w3-margin-right" style="text-decoration: none;">Back to Menu</a>
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
    <a href="{{ route('dashboard') }}" class="w3-bar-item w3-button w3-hover-white">Dashboard</a> 
    <a href="{{ route('manajemen_ruang') }}" class="w3-bar-item w3-button w3-hover-white">Manajemen Ruang</a> 
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
<!-- Main Content -->
{{-- <h3 class="w3-text-gray form-title"><b>KETERSEDIAAN RUANG KELAS</b></h3> --}}
<div class="w3-main" id="mainContent">

  <div class="button-container" style="margin-bottom: 20px;">
    <button class="btn-fill" onclick="window.location.href='{{ route('manajemen_ruang') }}'">Pengisian</button>
    <button class="btn-history" onclick="window.location.href='{{ route('ketersediaan_ruang') }}'">Riwayat Pengisian</button>
  </div>
  <h3 class="w3-text-gray form-title"><b>KETERSEDIAAN RUANG KELAS</b></h3>
  {{-- <h3 class="w3-text-gray"><b>KETERSEDIAAN RUANG KELAS</b></h3> --}}
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
          @foreach ($ruangs as $ruang) <!-- Pastikan untuk menggunakan nama yang sesuai -->
              <tr>
                  <td>{{ $ruang->gedung }}</td> <!-- Perbaiki nama variabel -->
                  <td>{{ $ruang->nama_ruang }}</td> <!-- Perbaiki nama variabel -->
                  <td>{{ $ruang->kapasitas }}</td> <!-- Perbaiki nama variabel -->
                  <td>
                      <a href="manajemen_ruang" class="btn-action btn-edit">✏️</a> <!-- Edit Button -->
                      <a href="#" class="btn-action btn-delete">🗑️</a> <!-- Delete Button -->
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

  <!-- Button Ajukan ke Dekan -->
  <a href="#" class="btn-submit">AJUKAN KE DEKAN</a>
</div>

<script>
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
