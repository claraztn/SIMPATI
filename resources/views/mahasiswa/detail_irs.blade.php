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

          /* Active link: underline stays when the link is active */
          .navbar-nav .nav-item.active .nav-link {
              text-decoration: underline;
              color: white; /* Ensure text color stays white */
          }

          /* Custom Dropdown */
          .dropdown-toggle::after {
              content: "";
              font-size: 0.9em;
              margin-left: 5px;
          }

          /* Button container styling */
          .button-container {
              display: flex; /* Align buttons horizontally */
              align-items: center; /* Vertically center the buttons */
              justify-content: flex-start; /* Align buttons to the left */
              margin-bottom: 20px;
          }

          .button-container span {
              font-size: 1.5em; /* Adjust size of the separator */
              color: #003f5c; /* Match button color */
          }

          /* Custom Table Styling */
          .table th, .table td {
              text-align: center;
          }

          .table th {
              background-color: #f0f0f0;
          }

          .table td input {
              width: 20px;
              height: 20px;
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
                        <!-- Menu Registrasi -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}" style="text-decoration: none;">Registrasi</a>
                        </li>
                        <!-- Menu IRS -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}" style="text-decoration: none;">IRS</a>
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
                    <h3 class="h5 pt-2">IRS MAHASISWA</h3>
                </div>
                <div class="card-body">
                    <div class="button-container">
                        <button class="btn-fill" onclick="window.location.href='{{ route('mahasiswa.irs') }}'">BUAT IRS</button>
                        <button class="btn-fill" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Detail
                            <i class="fas fa-chevron-down"></i>  <!-- Ikon panah Font Awesome -->
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">IRS</a></li>
                            <li><a class="dropdown-item" href="#">KHS</a></li>
                            <li><a class="dropdown-item" href="#">Transkrip</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
