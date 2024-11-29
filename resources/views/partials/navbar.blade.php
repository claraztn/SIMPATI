<nav class="navbar navbar-expand-md custom-navbar shadow-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="#">
            <strong>SIMPATI</strong>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
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
                        <a class="nav-link text-white" href="/dashboard_dekan" style="text-decoration: none;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/irs" style="text-decoration: none;">Perwalian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/jadwal" style="text-decoration: none;">Jadwal</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#!" id="accountDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, Pembimbing Akademik
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
