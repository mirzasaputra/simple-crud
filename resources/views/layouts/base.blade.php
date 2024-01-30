<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - PPDB SMK 17 Muncar</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="" class="navbar-brand">PPDB</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupport"><span class="navbar-toggler-icon"></span></button>

            <div class="navbar-collapse collapse" id="navbarSupport">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users') }}" class="nav-link">USERS</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-3">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>