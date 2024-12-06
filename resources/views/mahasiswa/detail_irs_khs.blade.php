<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DETAIL IRS DAN KHS MAHASISWA</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Optional Custom Styles -->
    <style>
        .custom-navbar {
            background-color: #003f5c;
        }

        .btn-fill,
        .btn-history {
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

        .btn-fill:hover,
        .btn-history:hover {
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

        label,
        select,
        input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }

        .btn-save {
            background-color: #28a745;
            /* Green color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            /* Make it full-width */
            margin-top: 20px;
        }

        .btn-save:hover {
            background-color: #218838;
            /* Darker green on hover */
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
            background-color: #00bff;
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.dashboard') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.registrasi') }}">Registrasi</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.irs') }}">IRS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('mahasiswa.detail-irs-khs') }}">Detail IRS &
                                KHS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{ auth()->user()?->username }}
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

    <div class="container mt-4">
        <!-- Accordion IRS, KHS, Transkrip -->
        <div class="accordion" id="accordionExample">
            <!-- IRS Accordion -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingIRS">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseIRS" aria-expanded="true" aria-controls="collapseIRS">
                        IRS (Rencana Studi)
                    </button>
                </h2>
                <div id="collapseIRS" class="accordion-collapse collapse show" aria-labelledby="headingIRS"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!--  IRS -->
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseIRS1" aria-expanded="false" aria-controls="collapseIRS1">
                                Semester 1
                            </button>
                        </div>
                        <div id="collapseIRS1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form IRS Semester 1 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download IRS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                Semester 2
                            </button>
                        </div>
                        <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form IRS Semester 2 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download IRS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseIRS3" aria-expanded="false" aria-controls="collapseIRS3">
                                Semester 3
                            </button>
                        </div>
                        <div id="collapseIRS3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form IRS Semester 3 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download IRS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                Semester 4
                            </button>
                        </div>
                        <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form IRS Semester 4 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download IRS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseIRS2" aria-expanded="false" aria-controls="collapseIRS2">
                                Semester 5
                            </button>
                        </div>
                        <div id="collapseIRS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form IRS Semester 5 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download IRS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KHS Accordion -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingKHS">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseKHS" aria-expanded="false" aria-controls="collapseKHS">
                        KHS (Kartu Hasil Studi)
                    </button>
                </h2>
                <div id="collapseKHS" class="accordion-collapse collapse" aria-labelledby="headingKHS"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Isi KHS -->
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseKHS1" aria-expanded="false" aria-controls="collapseIRS1">
                                Semester 1
                            </button>
                        </div>
                        <div id="collapseKHS1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form KHS Semester 1 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download KHS</a>
                            </div>

                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseKHS2" aria-expanded="false" aria-controls="collapseKHS2">
                                Semester 2
                            </button>
                        </div>
                        <div id="collapseKHS2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form KHS Semester 2 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download KHS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseKHS3" aria-expanded="false" aria-controls="collapseKHS3">
                                Semester 3
                            </button>
                        </div>
                        <div id="collapseKHS3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form KHS Semester 3 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download KHS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseKHS4" aria-expanded="false" aria-controls="collapseKHS4">
                                Semester 4
                            </button>
                        </div>
                        <div id="collapseKHS4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form KHS Semester 4 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download KHS</a>
                            </div>
                        </div>
                        <div class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseKHS5" aria-expanded="false" aria-controls="collapseKHS5">
                                Semester 5
                            </button>
                        </div>
                        <div id="collapseKHS5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <p>Form KHS Semester 5 content goes here...</p>
                                <a href="#" class="btn btn-fill">Download KHS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transkrip Accordion -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTranskrip">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTranskrip" aria-expanded="false" aria-controls="collapseTranskrip">
                        Transkrip
                    </button>
                </h2>
                <div id="collapseTranskrip" class="accordion-collapse collapse" aria-labelledby="headingTranskrip"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Isi Transkrip -->
                        <p>Berikut adalah transkrip nilai akhir mahasiswa yang mencakup nilai akhir dari seluruh mata
                            kuliah yang diambil.</p>
                        <a href="#" class="btn btn-fill">Download Transkip</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
