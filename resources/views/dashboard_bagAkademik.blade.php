<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body, h1, h2, h3, h4, h5 { font-family: "Poppins", sans-serif; }
        body { font-size: 16px; margin: 0; background-color: #f4f4f4; }

        /* Header styling */
        .w3-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #003f5c; /* Warna marina */
            color: white;
            padding: 10px 20px; /* Sesuaikan padding untuk ukuran header */
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px; /* Ukuran font untuk header */
        }

        .w3-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            position: absolute; /* Change to absolute positioning */
            left: 20px; /* Add space from the left edge */
        }

        .logout {
            cursor: pointer;
            background-color: #f44336;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        /* Main content styling */
        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center vertically */
            align-items: center; /* Center horizontally */
            min-height: calc(100vh - 80px); /* Full viewport height minus header height */
            padding: 30px; /* Adjust padding */
            text-align: center;
        }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            margin-bottom: 15px;
        }

        .btn-profile {
            background-color: #d8a354;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .profile-section h2 {
            margin: 5px 0;
            font-size: 22px;
            font-weight: bold;
        }

        .profile-section p {
            font-size: 18px;
            color: #555;
            margin: 5px 0;
        }

        /* Menu container */
        .menu-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .menu-card {
            background-color: #4a90e2;
            color: white;
            width: 220px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .menu-card:hover {
            background-color: #a9a9a9;
        }

        .menu-card img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header class="w3-container w3-header">
        <h1>Dashboard</h1>
        <a href="#" class="logout">LogOut</a>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Profile Section -->
        <div class="profile-section">
            <img src="https://via.placeholder.com/100" alt="Profile Picture">
            <a href="#" class="btn-profile">Lihat Profil</a>
            <h2>Prof. Dr. Susilo Budi, S.Si., M.Si.</h2>
            <p>NIP: 1233535454</p>
        </div>

        <!-- Menu Container -->
        <div class="menu-container">
            <a href="{{ route('manajemen_ruang') }}" class="menu-card">
                <img src="https://via.placeholder.com/30" alt="Icon">
                Manajemen Ruang
            </a>
        </div>        
    </div>
</body>
</html>
