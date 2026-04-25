<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height:100vh;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center mb-4">Lupa Password</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="/forgot-password">
                        @csrf
                        <input type="email" name="email" class="form-control mb-3" placeholder="Masukkan Email" required>
                        <button class="btn btn-warning w-100">Kirim Link Reset</button>
                    </form>

                    <div class="mt-3 text-center">
                        <small>
                            <a style="text-decoration: none;" href="/login">Kembali ke login</a>
                        </small>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>