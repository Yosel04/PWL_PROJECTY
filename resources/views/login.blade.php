<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(to right, #dbeafe, #eff6ff); min-height:100vh;">

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 430px;">
        <div class="card-body p-5">
            <h1 class="text-center fw-bold mb-4">LOGIN</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="email" name="email" class="form-control rounded-3 py-2" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control rounded-3 py-2" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3 py-2">
                    Login
                </button>
            </form>

            <p class="text-center mt-4 mb-0">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>