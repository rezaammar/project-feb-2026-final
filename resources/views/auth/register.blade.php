<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
        }
        .form-group {
            position: relative;
        }

    </style>
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100" style="flex-direction: column">
        <div class="logo-container mb-2">
            <img src="{{ asset('images/logowhitetext.jpg') }}"
            alt=""
            class="rounded-circle me-4"
            width="150"
            height="150"
            style="object-fit: cover;">
        </div>
        <div class="card shadow" style="width: 450px">
            <div class="card-header bg-dark text-white text-center">
                <h4>Registrasi dan Verifikasi Email</h4>
            </div>
            <div class="card-body">

                    {{-- ERROR VALIDATION --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- otp expayed --}}
                @if(session('error'))
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                    </div>
                </div>
                @endif  
                
                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" id="password" name="password" id="myPassword" class="form-control" required>
                        <span class="toggle-password mt-2" onclick="togglePassword()">
                        <span id="icon-eye">
                            <x-heroicon-o-eye style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                        </span>

                        <!-- icon eye slash -->
                        <span id="icon-eye-slash" style="display: none;">
                            <x-heroicon-o-eye-slash style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                        </span>
                    </span>
                    </div>

                    <button class="btn btn-success w-100">Daftar</button>

                    <div class="text-center mt-3">
                        <small>Sudah punya akun?
                            <a style="text-decoration: none;" href="/login">Login</a>
                        </small>
                    </div>
                </form>

            </div>
        </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eye = document.getElementById('icon-eye');
    const eyeSlash = document.getElementById('icon-eye-slash');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eye.style.display = "none";
        eyeSlash.style.display = "inline";
    } else {
        passwordInput.type = "password";
        eye.style.display = "inline";
        eyeSlash.style.display = "none";
    }
}
</script>
</body>
</html>
