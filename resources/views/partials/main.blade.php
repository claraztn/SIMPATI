<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /*
        .container {
            display: flex;
            flex: 1;
            overflow: hidden;
        } */

        h2,
        h3,
        h4,
        h5 {
            color: black;
            padding: 0;
            margin: 0;
        }

        table {
            background-color: rgb(234, 234, 234);
        }

        th,
        td {
            text-align: center;
        }

        /* .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #ffffff;
            text-align: start;
        } */
    </style>


    <style>
        .custom-navbar {
            background-color: #003f5c;
        }

        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    {{-- @include('partials.header') --}}

    @include('partials.navbar')
    <div class="container">
        <!-- Sidebar -->
        {{-- @include('partials.sidebar') --}}

        <!-- Navbar -->

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>


</html>
