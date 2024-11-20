<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Sistem Informasi Manajemen Perencanaan Akademik Terpadu UNDIP (SIMPATI) ')</title>
    
    <!-- External Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- External Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-blue-100">
<div class="flex flex-col h-screen">

    <!-- Header -->
    <div class="bg-gray-300 shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center justify-center w-full">
            <div class="flex items-center">
                <img src="https://1.bp.blogspot.com/-tThKR0i2DdQ/XrO4fFiulNI/AAAAAAAAB_s/4_UY2xeR3SsE9_5MGBdvsQtBJgNxf9e_wCLcBGAsYHQ/s1600/Logo%2BUndip%2BUniversitas%2BDiponegoro.png" alt="Logo UNDIP" class="w-16 h-16 mr-2">
                <h2 class="font-bold text-blue-500 text-xl">Sistem Monitoring Mahasiswa<br>UNDIP</h2>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-wrap">
        <!-- Sidebar -->
        <div class="p-2 bg-white w-full md:w-60 hidden md:block">
            <nav>
                @section('sidebar')
                    <div class="text-gray-500 py-2 px-4">
                        <a href="{{ route('mahasiswa.dashboard') }}" class="block text-gray-700 hover:text-blue-500 py-2">
                            Dashboard
                        </a>
                        <a href="{{ route('logout') }}" class="block text-gray-700 hover:text-blue-500 py-2">
                            Logout
                        </a>
                    </div>
                @show
            </nav>
        </div>

        <!-- Main Section -->
        <div class="flex-1 p-4">
            @yield('konten')
        </div>
    </div>
</div>
</body>
</html>
