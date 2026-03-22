@extends('layouts.app')

@section('content')


<div class="container-fluid">    
    @if(session('success'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hitung Harga Teoritis Saham Emiten</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hitungAverage') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Saham</label>
                    <input type="text" name="nama_saham" class="form-control" placeholder="cth: ENRG" maxlength="4" style="text-transform:uppercase" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Penutupan Cumdate</label>
                    <input type="number" name="harga_cum" class="form-control" placeholder="cth: 500" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rasio Kiri</label>
                    <input type="number" name="rasio_kiri" class="form-control" placeholder="cth: 3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tebus</label>
                    <input type="number" name="harga_tebus" class="form-control" placeholder="cth: 400" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rasio Kanan</label>
                    <input type="number" name="rasio_kanan" class="form-control" placeholder="cth: 4" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <br>
    <hr>

    <h4>Data Tabel</h4>
    <button id="">Tampilkan Isi Tabel</button>
    <x-heroicon-o-lock-closed style="height: 1em; width: 1em; vertical-align: middle; margin-right: 0.25rem;" />
    <br>
    <canvas id="" width="100" height="50"></canvas>


@endsection