<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(to right, #dbeafe, #eff6ff); min-height:100vh;">

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 460px;">
        <div class="card-body p-5">
            <h1 class="text-center fw-bold mb-4">REGISTER</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control rounded-3 py-2" placeholder="Nama" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control rounded-3 py-2" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control rounded-3 py-2" placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control rounded-3 py-2" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3 py-2">
                    Register
                </button>
            </form>

            <p class="text-center mt-4 mb-0">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>