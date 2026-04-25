<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi OTP</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height:100vh;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="mb-3">Masukkan OTP</h4>
                    <p class="text-muted">Cek email kamu</p>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="/verify-otp">
                        @csrf
                        <input type="text" name="otp" maxlength="6" class="form-control mb-3 text-center" placeholder="6 digit OTP" required>
                        <button class="btn btn-primary w-100">Verifikasi</button>
                    </form>
                    <p>Kode akan kedaluwarsa dalam: <span id="countdown"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const expiredAt = new Date("{{ $otpExpiresAt }}").getTime();
    const countdownEl = document.getElementById('countdown');

    const timer = setInterval(function () {
        const now = new Date().getTime();
        const distance = expiredAt - now;

        if (distance <= 0) {
            clearInterval(timer);
            countdownEl.innerHTML = "00:00";
            return;
        }

        const minutes = Math.floor(distance / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // format jadi 2 digit (01:09, 00:30, dst)
        const formattedMinutes = String(minutes).padStart(2, '0');
        const formattedSeconds = String(seconds).padStart(2, '0');

        countdownEl.innerHTML = formattedMinutes + ":" + formattedSeconds;

    }, 1000);
</script>
</body>
</html>