@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="p-3 mb-2 bg-light rounded-3 border shadow-sm">
            <div class="container-fluid py-2">
                <h4 class="fs-3 fw-bold text-primary mb-1">Selamat Datang, {{ $userName }}! di Dashboard {{ $jenisDashboard }}</h4>
                <p class="fs-6 text-secondary mb-3">
                    Anda memiliki produk yang siap dikelola hari ini.
                </p>
                <hr class="my-2">
                <form action="#features">
                    <button onclick="document.getElementById('features').scrollIntoView({ behavior: 'smooth' })"
                    class="btn btn-primary btn-sm px-4" type="button">Lihat Fitur</button>
                </form>
                
            </div>
        </div> 

        {{-- allert masa aktif sudah habis --}}
            @if(session('expired'))
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    {{ session('expired') }}
                </div>
            </div>
            @endif
        {{-- Fitur buku langsung download bisa ditampilkan dan dicollapse --}}
        <div class="collapse {{ $isCollapsed == '1' ? '' : 'show' }}">
            <div class="card card-body text-center">
                <h5>Buku Gratis Cara Cari Saham</h5>
                <div class="text-center">
                    <img src="{{ asset('images/contohbuku.jpg') }}" style="width:240px" alt="Buku">
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <form action="{{ $book->link }}" method="">
                    @csrf
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">
                            Download Buku
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- FEATURES GRATIS -->
        <section class="features" id="features">
            <div class="container py-5">
                <h3 class="mb-4 fw-bold">Fitur Gratis</h3>

                <div class="row g-4">
                    <div class="col-4 col-md-4">
                        @if(Auth::user()->status->status == 'Active')
                        <a href="{{ route('average') }}" class="text-decoration-none text-dark">
                            <div class="card card-kalkulator card-kalkulator-klik p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-calculator style="color:lightblue ; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h3>Kalkulator Saham</h3>
                                <small class="text-muted">- Menghitung Average Up suatu saham</small>
                                <small class="text-muted">- Menghitung Average Down suatu saham</small>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('averagefree') }}" class="text-decoration-none text-dark">
                            <div class="card card-kalkulator card-kalkulator-klik p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-calculator style="color:lightblue ; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h3>Kalkulator Saham</h3>
                                <small class="text-muted">- Menghitung Average Up suatu saham</small>
                                <small class="text-muted">- Menghitung Average Down suatu saham</small>
                            </div>
                        </a>
                        @endif
                    </div>

                    <div class="col-4 col-md-4">
                        <a href="{{ route('sosial') }}" class="text-decoration-none text-dark">
                            <div class="card card-kalkulator card-kalkulator-klik p-4 text-center">
                                <div class="align-items-center">
                                    <x-heroicon-o-user-group style="color:lightblue ; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h3>Grup Saham Stock Realize</h3>
                                <small class="text-muted">Grup gratis untuk komunitas dan sharing bareng</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 col-md-4">
                        <a  class="text-decoration-none text-dark">
                            <div class="card card-kalkulator p-4 text-center">
                                @if(Auth::user()->status->status == 'Active')
                                <!-- Menu untuk Member Aktif -->
                                    <br>
                                    <h3>Fungsi Premium</h3>
                                    <small class="text-muted">- Menggunakan database tersimpan</small>
                                    <small class="text-muted">- Saham yang dihitung tidak hilang</small>
                                @else
                                <!-- Menu untuk Member non-Aktif -->
                                    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                                    <br>
                                    <h3>Fungsi Premium Kalkulator Saham</h3>
                                    <small class="text-muted">- Menggunakan database tersimpan</small>
                                    <small class="text-muted">- Saham yang dihitung tidak hilang</small>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <div class="container py-5 mb-4">
            <h3 class="mb-4 fw-bold">Tools Premium</h3>
            {{-- <div class="d-flex mb-4">
                    <form action="/tools" method="">
                    @csrf
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary btn-sm d-block d-md-none">
                            Telusuri <span><x-heroicon-o-arrow-right style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" /></span>
                        </button>
                    </div>
                    </form>
                </div> --}}

            @if(Auth::user()->status->status == 'Active')
                <!-- Menu untuk Member Aktif -->
                <div class="row g-4">

                    {{-- Feature 1 --}}
                    <div class="col-3 col-md-3">
                        <a href="{{ route('teoritis') }}" class="text-decoration-none text-dark">
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
                    <div class="col-3 col-md-3">
                        <a href="{{ route('index1') }}" class="text-decoration-none text-dark">
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
                    <div class="col-3 col-md-3">
                        <a href="{{ route('rasio') }}" class="text-decoration-none text-dark">
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
                    <div class="col-3 col-md-3">
                        <a href="{{ route('berita') }}" class="text-decoration-none text-dark">
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
            @else
                <!-- Menu untuk Member Non-Aktif -->
                <div class="row g-4">

                    {{-- Feature 1 --}}
                    <div class="col-3 col-md-3">
                        <a  class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                                <div class="align-items-center">
                                    <x-heroicon-o-variable style="color:red; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>Teoritis</h5>
                                <small class="text-muted">Menghitung berapa harga teoritis saham ketika tanggal Expayed Date</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 2 --}}
                    <div class="col-3 col-md-3">
                        <a  class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                                <div class="align-items-center">
                                    <x-heroicon-o-underline style="color:green; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>Tebus RI</h5>
                                <small class="text-muted">Menghitung jumlah lot baru saham, biaya tebus RI, total lot yang dimiliki, dan harga average setelah tebus</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 3 --}}
                    <div class="col-3 col-md-3">
                        <a  class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
                                <div class="align-items-center">
                                    <x-heroicon-o-sparkles style="color:yellow; margin-right: 0.25rem;" class="icon" />
                                </div>
                                <h5>AI Rasio RI</h5>
                                <small class="text-muted">Menghitung dengan tepat rasio dengan AI untuk pertimbangan beli saham sebelum berita rasio dikeluarkan</small>
                            </div>
                        </a>
                    </div>

                    {{-- Feature 4 --}}
                    <div class="col-3 col-md-3">
                        <a  class="text-decoration-none text-dark">
                            <div class="card card-feature p-4 text-center">
                                <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
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
            @endif

        </div>

        <!-- CTA -->
        <section class="cta text-center">
            <div class="container">
                <h2 class="fw-bold mb-3"><span style="color:red; ">Keputusan</span> cepat, <span style="color: red;">beli</span> <span style="color: blue;">saham</span> juga cepat</h2>
                <p class="mb-4">
                    Berlangganan sekarang dan rasakan fitur premium.
                </p>
                <a href="/payment" class="btn btn-primary">Berlangganan</a>
            </div>
        </section>

        <br><br><br>
    </div>



@endsection