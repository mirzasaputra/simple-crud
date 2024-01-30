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
    <div class="col-md-4 col-sm-6 col-10 mx-auto my-5">
        @error('general_errors')
            <div class="alert bg-danger">{{ $message }}</div>
        @enderror
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <h1>Login</h1>
                    <hr>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <i class="text-danger small">{{ $message }}</i>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <i class="text-danger small">{{ $message }}</i>
                        @enderror
                    </div>
                    <hr>
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>