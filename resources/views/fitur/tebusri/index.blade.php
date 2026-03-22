@extends('layouts.app')

@section('content')


<div class="container-fluid">
    @if(session('error'))
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
    </div>
    @endif    
    @if(session('success'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hitung Harga Tebus RI</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('tebusri.store') }}" method="POST">
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
                <p class="small">Note : Maksimal data ditambahkan hanya 5 data</p>
            </form>
        </div>
    </div>

    <br>
    <hr>

<h4>Data Tabel Saham dan Harga Teoritis</h4>
<table class="table table-bordered">
    <tr>
        <th>Nama Saham</th>
        <th>Harga Cumdate</th>
        <th>Rasio RI</th>
        <th>Harga Tebus</th>
        <th>Harga Teoritis (Exdate)</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->nama_saham }}</td>
        <td>{{ (float) $product->harga_cum }}</td>
        <td>
            <p>{{ (float) $product->rasio_kiri }} : {{ (float) $product->rasio_kanan }}</p>
        </td>
        <td>{{ (float) $product->harga_tebus }}</td>
        <td>{{ (float) $product->harga_teoritis }}</td>
    </tr>
    @endforeach
</table>

    <br>
    <canvas id="" width="100" height="50"></canvas>


@endsection