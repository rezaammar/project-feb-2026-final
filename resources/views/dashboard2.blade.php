@extends('layouts.appapi')

@section('content')
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<div class="container mt-2">

    <div class="p-3 mb-2 bg-light rounded-3 border shadow-sm">
        <div class="container-fluid py-2">
            <h4 class="fs-3 fw-bold text-primary mb-1">Payment System Stock Realize</h4>
            <p class="fs-6 text-secondary mb-3">
                Cocok sekali untuk Anda investor hebat di saham pilih paket Premium ini.
            </p>
            <hr class="my-2">
        </div>
    </div>  
    
    {{-- allert masa aktif sudah habis --}}
    {{-- @if(session('expired'))
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
            {{ session('expired') }}
        </div>
    </div>
    @endif --}}

    <h3>Pilih Paket Langganan</h3>

    <div class="row">
        @foreach($packages as $package)
        <div class="col-md-4">
            <div class="card p-4 text-center shadow">
                <h4>{{ $package->name }}</h4>
                <h2>Rp {{ number_format($package->price) }}</h2>

                <button class="btn btn-primary"
                        onclick="subscribe({{ $package->id }})">
                    Berlangganan
                </button>
            </div>
        </div>
        @endforeach

    </div>
</div>


    {{-- Memanggil Sidebar tombol mobile bawah --}}
@include('partials._sidebar')

<script>
function subscribe(id) {
    fetch('/subscribe/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    //cara cek isi token
    // .then(response => console.log(response.json()))
    .then(data => { 
        snap.pay(data.snapToken);
    });
}
</script>
@endsection