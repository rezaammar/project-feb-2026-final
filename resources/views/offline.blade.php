<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Offline</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        text-align: center;
    }

    .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        padding: 40px 30px;
        width: 90%;
        max-width: 380px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        animation: fadeIn 0.6s ease;
    }

    .icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        position: relative;
    }

    /* Icon wifi sederhana (pure CSS) */
    .icon::before,
    .icon::after {
        content: '';
        position: absolute;
        border: 4px solid white;
        border-radius: 50%;
        opacity: 0.8;
    }

    .icon::before {
        width: 70px;
        height: 70px;
        top: 0;
        left: 0;
    }

    .icon::after {
        width: 40px;
        height: 40px;
        top: 15px;
        left: 15px;
    }

    .icon span {
        position: absolute;
        width: 12px;
        height: 12px;
        background: white;
        border-radius: 50%;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
    }

    h2 {
        margin-bottom: 10px;
        font-weight: 600;
    }

    p {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .btn {
        display: inline-block;
        padding: 10px 25px;
        border-radius: 50px;
        background: white;
        color: #224abe;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: 0.3s;
    }

    .btn:hover {
        background: #e2e6ff;
        transform: translateY(-2px);
    }

    .btn:active {
        transform: scale(0.95);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

</head>
<body>

<div class="card">
    <div class="icon">
        <span></span>
    </div>

    <h2>Kamu Sedang Offline</h2>

    <p>
        Koneksi internet terputus.<br>
        Periksa jaringan kamu lalu coba lagi.
    </p>

    <button class="btn" onclick="location.reload()">
        Coba Lagi
    </button>
</div>

{{-- Deteksi online --}}
<script>
    window.addEventListener('online', () => {
        location.reload(); // lebih aman daripada redirect '/'
    });
</script>
</body>
</html>