<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Landing Page</title>
        <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/vendors/iconly/bold.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.svg') }}" type="image/x-icon">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow-lg p-4 text-center" style="border-radius: 15px; width: 100%;">
                <img src="{{ asset('dist/assets/images/logo/TraceStudy.png') }}" alt="TraceStudy Logo" class="logo mb-4" style="max-width: 200px; display: block; margin: 0 auto;">
                <h1 class="display-4 font-weight-bold">Welcome to TraceStudy</h1>
                <p class="lead">Please choose an option to continue.</p>
                <div class="row w-100">
                    <div class="col-md-6">
                        <div class="card shadow-lg p-4 text-center" style="border-radius: 15px;">
                            <h1 class="display-4 font-weight-bold">Dosen</h1>
                            <div class="mt-4">
                                <a href="{{ route('login.dosen') }}" class="btn btn-primary btn-lg mx-2">
                                    Login as Dosen
                                </a>
                                <a href="{{ route('register.dosen') }}" class="btn btn-secondary btn-lg mx-2">
                                    Register as Dosen
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg p-4 text-center" style="border-radius: 15px;">
                            <h1 class="display-4 font-weight-bold">Mahasiswa</h1>
                            <div class="mt-4">
                                <a href="{{ route('login.mahasiswa') }}" class="btn btn-primary btn-lg mx-2">
                                    Login Mahasiswa
                                </a>
                                <a href="{{ route('register.mahasiswa') }}" class="btn btn-secondary btn-lg mx-2">
                                    Register as Mahasiswa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>