@extends('layouts.main')

@section('container')

<!-- HERO / JUMBOTRON -->
<section class="hero">
    <div class="container text-center">
        <h1 class="display-4 mb-4">
            Aplikasi Digital untuk<br>Anak Saham Sepertimu
        </h1>
        <p class="mb-5">
            Membantu kamu menghitung dan menyimpan harga rata-rata, harga teoritis, dan harga lainnya dengan cepat
        </p>
        <a href="/login" class="btn btn-main btn-lg me-3">Daftar Gratis</a>
        <a href="#features" onclick="document.getElementById('features').scrollIntoView({ behavior: 'smooth' })" class="btn btn-outline-light btn-lg">Lihat Fitur</a>
    </div>
</section>



<!-- 2 PROBLEM -->
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Masalah investor</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class=" mx-auto">
                        <img style="height: 5em" src="{{ asset('images/silang.png') }}" alt="">
                    </div>
                    <h5 class="fw-semibold">Pusing hitung saham ?</h5>
                    <p class="text-muted">
                        Beli saham ini harus dihitung, semuanya dihitung, hitung terus kapan belinya
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class="mx-auto">
                        <img style="height: 5em" src="{{ asset('images/silang.png') }}" alt="">
                    </div>
                    <h5 class="fw-semibold">Lupa sama hitungan saham kemarin ?</h5>
                    <p class="text-muted">
                        Udah dihitung harus hitung lagi, dua kali kerja
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class="mx-auto">
                        <img style="height: 5em" src="{{ asset('images/silang.png') }}" alt="">
                    </div>
                    <h5 class="fw-semibold">Ketinggalan terus info saham ?</h5>
                    <p class="text-muted">
                        Pusing, beritanya muncul, saham udah naik tinggi
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3 SOLUSI -->
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Solusinya apa ?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class="feature-icon mx-auto">📈</div>
                    <h5 class="fw-semibold">Kalkulator Saham</h5>
                    <p class="text-muted">
                        Hitung hanya dengan masukan angka saja beress
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class="feature-icon mx-auto">🛡️</div>
                    <h5 class="fw-semibold">Database</h5>
                    <p class="text-muted">
                        Hitungan kemarin bisa dipakai lagi, buat ambil keputusan saham, tanpa hitung manual lagi
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center h-100" data-aos="fade-up">
                    <div class="feature-icon mx-auto">🚀</div>
                    <h5 class="fw-semibold">Informasi Update</h5>
                    <p class="text-muted">
                        Saham apa saja yang ngadain akuisisi, yang expansi, dan story saham lainnya
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. BENEFIT -->
<section class="features">
    <div class="container text-black">
        {{-- <div class="text-center mb-5">
            <h2 class="fw-bold">Benefit</h2>
        </div> --}}

        <div class="row g-4">
            <div class="col-md-4">
                <div style="background-color: aqua" class="feature-card h-100" data-aos="fade-up">
                    <h4>Benefit</h4>
                    <ul>
                        <li>Hemat Tenaga</li>
                        <li>Hemat Waktu</li>
                        <li>Simpel</li>
                        <li>Bisa dibuka dimana-mana</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div style="background-color: aqua" class="feature-card text-center h-100" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('images/dekstop.png') }}" alt="">
                    <img class="img-fluid" src="{{ asset('images/dekstopsplit.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

 {{-- 5. View Mobile --}}
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">View Mobile</h2>
        </div>

        <div class="row g-3">
            <div class="col-md-3">
                <div style="background-color: aqua" class="feature-card text-center h-100" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('images/notifikasi.png') }}" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <div style="background-color: aqua" class="feature-card text-center h-100" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('images/database.png') }}" alt="">
                </div>
            </div>

            <div class="col-md-3">
                <div style="background-color: aqua" class="feature-card text-center h-100" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('images/bar.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. FEATURES GRATIS -->
<section class="features" id="features">
            <div class="container py-5">
                <h3 class="mb-4 fw-bold text-center">Fitur Gratis</h3>

                <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-right">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-kalkulator card-kalkulator-klik p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-calculator style="color:lightblue ; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h3>Kalkulator Saham</h3>
                                <small class="text-muted">- Menghitung Average Up suatu saham</small>
                                <small class="text-muted">- Menghitung Average Down suatu saham</small>
                            </div>
                        </a>
        
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <a class="text-decoration-none text-dark">
                            <div class="card card-kalkulator card-kalkulator-klik p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-user-group style="color:lightblue ; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h3>Grup Saham Stock Realize</h3>
                                <small class="text-muted">Grup gratis untuk komunitas dan sharing bareng</small>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
</section>
{{-- 7. FITUR PREMIUM --}}
<section class="features" id="features">
    <div class="container py-5 mb-4">
            <h3 class="mb-4 fw-bold text-center">Tools</h3>

                <div class="row g-4">

                    {{-- Feature 1 --}}
                    <div class="col-md-3" data-aos="fade-left">
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
                    <div class="col-md-3" data-aos="fade-left">
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
                    <div class="col-md-3" data-aos="fade-left">
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
                    <div class="col-md-3" data-aos="fade-left">
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
</section>

<!-- 8. TESTIMONI & FAQ -->
<section class="features" >
    <div class="container text-black">
        {{-- <div class="text-center mb-5">
            <h2 class="fw-bold">Benefit</h2>
        </div> --}}

        <div class="row g-4">
            <div class="col-md-6 feature-card" style="background-color: rgb(187, 224, 248)" data-aos="fade-up">
                <h4 class="text-center">Testimoni</h4>
                <div class="slider">
                    <div class="slides" id="slides">
                        <img src="{{ asset('images/testimoni1.jpg') }}" class="slide active">
                        <img src="{{ asset('images/testimoni2.jpg') }}" class="slide">
                        <img src="{{ asset('images/testimoni3.jpg') }}" class="slide">
                    </div>

                    <!-- Navigasi Bulat -->
                    <div class="dots" id="dots">
                        <span class="dot active" onclick="goToSlide(0)"></span>
                        <span class="dot" onclick="goToSlide(1)"></span>
                        <span class="dot" onclick="goToSlide(2)"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div style="background-color: rgb(187, 224, 248)" class="feature-card h-100" data-aos="fade-up">
                    <h4 class="text-center">FAQ</h4>
                    <ul>
                        <li>Fiturnya gratis ya ka ?</li>
                        <p class="text-muted">Jawaban : Gratis yang average up dan down serta grup saham</p>
                        <li>Ada grup saham komunitasnya ka ?</li>
                        <p class="text-muted">Jawaban : Ada ka setelah login</p>
                        <li>Aman ngga ka cara daftarnya ?</li>
                        <p class="text-muted">Jawaban : Aman ka, semua email diverifikasi dan password dienkripsi</p>
                        <li>Informasi saham setiap hari muncul ka ?</li>
                        <p class="text-muted">Jawaban : Hanya setiap ada berita right issue dan story lainnya</p>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta text-center">
    <div class="container mt-3">
        <h2 class="fw-bold mb-3">Tingkatkan Pengalaman Digital Anda</h2>
        <p class="mb-4">
            Nantikan Fitur-Fitur Selanjutnya Untuk Mempermudah Investor & Trader Saham.
        </p>
        <a href="/login" class="btn btn-light btn-lg fw-semibold">Daftar Sekarang Gratis</a>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
    <div class="container">
        <small>© 2026 Stock Realize. All Rights Reserved.</small>
    </div>
</footer>

@endsection