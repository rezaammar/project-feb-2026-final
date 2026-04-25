```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Landing Page Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .hero {
            background: #f8f9fa;
            padding: 100px 0;
        }

        .section {
            padding: 70px 0;
        }

        .cta {
            background: #0d6efd;
            color: white;
            padding: 70px 0;
        }

        /* Hover effect card */
        .card {
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

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
    
{{-- 1. HERO --}}
<section class="hero text-center">
    <div class="container">
        <h1 class="fw-bold" data-aos="fade-up">Website Profesional dalam 3 Hari</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">
            Solusi cepat untuk bisnis kamu tampil online
        </p>
        <a href="#pricing" class="btn btn-primary btn-lg mt-3"
           data-aos="zoom-in" data-aos-delay="400">
           Mulai Sekarang
        </a>
    </div>
</section>

{{-- 2. PROBLEM --}}
<section class="section text-center">
    <div class="container">
        <h2 class="fw-bold" data-aos="fade-up">Masalah Umum</h2>

        <div class="row mt-4">
            <div class="col-md-4" data-aos="fade-up">❌ Website lambat</div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">❌ Tidak menarik</div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">❌ Sepi customer</div>
        </div>
    </div>
</section>

{{-- 3. SOLUSI --}}
<section class="section bg-light text-center">
    <div class="container">
        <h2 data-aos="fade-right">Solusi Kami</h2>
        <p data-aos="fade-left">Website modern, cepat, dan menjual</p>
    </div>
</section>

{{-- 4. BENEFIT --}}
<section class="section text-center">
    <div class="container">
        <h2 data-aos="fade-up">Keuntungan</h2>

        <div class="row mt-4">
            <div class="col-md-4" data-aos="zoom-in">🚀 Penjualan naik</div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">⏱️ Hemat waktu</div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">💼 Profesional</div>
        </div>
    </div>
</section>

{{-- 5. FITUR --}}
<section class="section bg-light text-center">
    <div class="container">
        <h2 data-aos="fade-up">Fitur</h2>

        <div class="row mt-4">
            <div class="col-md-3" data-aos="flip-left">Responsive</div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="100">SEO</div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="200">Fast</div>
            <div class="col-md-3" data-aos="flip-left" data-aos-delay="300">Secure</div>
        </div>
    </div>
</section>

{{-- 6. TESTIMONI --}}
<section class="section text-center">
    <div class="container">
        <h2 data-aos="fade-up">Testimoni</h2>

        <div class="row mt-4">
            <div class="col-md-4" data-aos="fade-right">"Mantap banget!"</div>
            <div class="col-md-4" data-aos="fade-up">"Cepat & rapi"</div>
            <div class="col-md-4" data-aos="fade-left">"Recommended"</div>
        </div>
    </div>
</section>

{{-- 7. HASIL --}}
<section class="section bg-light text-center">
    <div class="container">
        <h2 data-aos="zoom-in">Hasil Nyata</h2>
        <p data-aos="fade-up">Penjualan naik hingga 2x lipat</p>
    </div>
</section>

{{-- 8. PRICING --}}
<section id="pricing" class="section text-center">
    <div class="container">
        <h2 data-aos="fade-up">Harga</h2>

        <div class="row mt-4">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="card p-3">Basic - Rp1jt</div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">
                <div class="card p-3 border-primary">Pro - Rp2.5jt</div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="card p-3">Premium - Rp5jt</div>
            </div>
        </div>
    </div>
</section>

{{-- 9. URGENCY --}}
<section class="section text-center text-danger">
    <div class="container">
        <h3 data-aos="pulse">🔥 Promo Hari Ini!</h3>
    </div>
</section>

{{-- 10. FAQ --}}
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center" data-aos="fade-up">FAQ</h2>

        <div class="mt-4">
            <p data-aos="fade-right"><strong>Berapa lama?</strong> 3 hari</p>
            <p data-aos="fade-left"><strong>Revisi?</strong> Gratis</p>
        </div>
    </div>
</section>

{{-- 11. CTA --}}
<section class="cta text-center">
    <div class="container">
        <h2 data-aos="zoom-in">Siap mulai?</h2>
        <a href="#" class="btn btn-light btn-lg mt-3" data-aos="fade-up">
            Pesan Sekarang
        </a>
    </div>
</section>
{{-- FITURrrrrrrrrrrrrrrrrrrrr --}}
<div class="container py-5 mb-4">
            <h3 class="mb-4 fw-bold">Tools Premium</h3>

                <div class="row g-4">

                    {{-- Feature 1 --}}
                    <div class="col-md-3">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-variable style="color:red; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>Teoritis</h5>
                                <small class="text-muted">Menghitung berapa harga teoritis saham ketika tanggal Expayed Date</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 2 --}}
                    <div class="col-md-3">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-underline style="color:green; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>Tebus RI</h5>
                                <small class="text-muted">Menghitung jumlah lot baru saham, biaya tebus RI, total lot yang dimiliki, dan harga average setelah tebus</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 3 --}}
                    <div class="col-md-3">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-sparkles style="color:yellow; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>AI Rasio RI</h5>
                                <small class="text-muted">Menghitung dengan tepat rasio dengan AI untuk pertimbangan beli saham sebelum berita rasio dikeluarkan</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 4 --}}
                    <div class="col-md-3">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-information-circle style="color:blue; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>Informasi Saham</h5>
                                <small class="text-muted">Bocoran informasi saham apa aja sebelum berita asli muncul</small>
                                <small class="text-muted">(Notifikasi jika ada informasi muncul)</small>
                            </div>
                        </a>
                    </div>

                </div>
</div>
{{-- FOOTER --}}
<footer class="text-center p-3 bg-dark text-white">
    <p>© 2026 - Bisnis Kamu</p>
</footer>

{{-- JS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

</body>
</html>
```
