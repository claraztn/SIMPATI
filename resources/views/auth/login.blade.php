<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%; 
            margin: 0; 
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; 
            overflow: hidden; 
            background-image: url('{{ asset('img/newbg.webp') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            margin: auto;  
            max-width: 1000px;
            padding: 50px;
            margin-top: 110px;
        }

        /* Dark overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            z-index: -1; 
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            z-index: 1; 
        }

        .card-header h2 {
            font-weight: bold; 
            color: white; 
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            background-color: #003f5c; 
            color: white;
            text-align: center;
            text-emphasis: none;
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
            font-size: 0.875rem; 
        }

        /* Footer style */
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #003f5c; 
            color: white; 
            box-shadow: 0px -1px 5px rgba(0, 0, 0, 0.1); 
            border-top: 2px solid #003f5c; 
            padding: 10px 0; 
            text-align: center;
            font-size: 0.875rem;
            z-index: 1; 
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Dark overlay -->
    <div class="overlay"></div>

    <!-- Main container for centering -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>SIMPATI</h2>
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
                        <h5>Single Sign On (SSO)</h5>
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
                        <form action="{{ route('authenticate') }}" method="POST" autocomplete="on">
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

    <!-- Footer with information -->
    <footer>
        <p>Hand-crafted & Made with ❤️ by Kelompok 6</p>
        <p>&copy; 2024 All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>