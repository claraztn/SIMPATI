<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%; /* Full height for both html and body */
            margin: 0; /* Remove default margin */
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Ensure the overlay can be positioned on top */
            overflow: hidden; /* Prevent any overflow from showing */
        }

        /* Background image with overlay */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('img/backgroundLogin.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1; /* Put the background behind the content */
        }

        /* Dark overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent dark overlay */
            z-index: -1; /* Ensure it overlays the background but stays behind the content */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            z-index: 1; /* Ensure the card is on top */
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            background-color: #003f5c;
            color: white;
            text-align: center;
        }

        .form-control {
            border-radius: 20px;
            padding: 10px 15px;
        }

        .btn-primary {
            border-radius: 20px;
            font-weight: bold;
            background-color: #005C76;
            border-color: #005C76;
        }

        .btn-primary:hover {
            background-color: #003f5c;
            border-color: #003f5c;
        }

        .logo {
            width: 50px;
            height: auto;
            margin-bottom: 10px;
        }

        .alert {
            font-size: 0.875rem; /* Smaller text for error messages */
        }
    </style>
</head>
<body>
    <!-- Background image and overlay -->
    <div class="background"></div>
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>SIMPATI</h2>
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
                        <h4>Single Sign On (SSO)</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('authenticate') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
