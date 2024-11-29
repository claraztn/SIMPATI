<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('img/bg.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
        }
        
        .card-header {
            border-radius: 10px 10px 0 0;
            font-size: 1.25rem;
            background-color: #003f5c; 
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center text-white">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
                        <h4>Single Sign On<br>SSO</h4>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
