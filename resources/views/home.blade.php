@extends('layouts.main')

@section('container')

<!-- HERO / JUMBOTRON -->
<section class="hero">
    <div class="container text-center">
        <h1 class="display-4 mb-4">
            Platform Digital untuk<br>Anak Saham Sepertimu
        </h1>
        <p class="mb-5">
            Membantu kamu menghitung dan menyimpan harga rata-rata, harga teoritis, dan harga lainnya dengan cepat
        </p>
        <a href="#" class="btn btn-main btn-lg me-3">Mulai Berlangganan</a>
        <a href="#" class="btn btn-outline-light btn-lg">Lihat Fitur</a>
    </div>
</section>

<!-- FEATURES -->
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Fitur Unggulan</h2>
            <p class="text-muted">Dirancang untuk mendukung pertumbuhan Anda</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center h-100">
                    <div class="feature-icon mx-auto">📈</div>
                    <h5 class="fw-semibold">Analitik Cerdas</h5>
                    <p class="text-muted">
                        Lihat performa dan data penting dengan visualisasi yang mudah dipahami.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100">
                    <div class="feature-icon mx-auto">🛡️</div>
                    <h5 class="fw-semibold">Keamanan Data</h5>
                    <p class="text-muted">
                        Sistem keamanan berlapis untuk melindungi data dan privasi Anda.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100">
                    <div class="feature-icon mx-auto">🚀</div>
                    <h5 class="fw-semibold">Akses Cepat</h5>
                    <p class="text-muted">
                        Platform ringan, cepat, dan dapat diakses di berbagai perangkat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Tingkatkan Pengalaman Digital Anda</h2>
        <p class="mb-4">
            Bergabung sekarang dan rasakan fitur premium tanpa batas.
        </p>
        <a href="#" class="btn btn-light btn-lg fw-semibold">Daftar Sekarang</a>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
    <div class="container">
        <small>© 2026 Stock Realize. All Rights Reserved.</small>
    </div>
</footer>

@endsection