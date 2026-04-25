@extends('layouts.app')

@section('content')


<div class="container-fluid">
    @if(session('success'))
    <div class="card-body">
        <div class="alert alert-light" role="alert">
        {{ session('success') }}
        </div>
    </div>
    @endif
    @if(session('delete'))
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
        </div>
    </div>
    @endif
    @if(session('error'))
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
    </div>
    @endif     
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hitung Rasio RI</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hitungrasio') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Saham</label>
                    <input type="text" name="nama_saham" class="form-control" placeholder="" maxlength="4" style="text-transform:uppercase" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Jumlah Saham Beredar Awal</label>
                    <input type="number" name="beredar_awal" class="form-control" placeholder="(dalam lembar)" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Saham Baru yang Diterbitkan</label>
                    <input type="number" name="beredar_tambahan" class="form-control" placeholder="(dalam lembar)" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mb-2">
                        💾 Simpan dan Hasilkan
                    </button>
                </div>
                <p class="small" style="margin-bottom: 0px">Note : Maksimal data ditambahkan hanya 5 data</p>
                <p class="small">Saran : Karena jumlah saham beredar yang ditambahkan itu 
                    banyak angkanya dan bervariasi, lebih baik bulatkan ambil 3-5 angka awal saja dan belakangnya ditulis 000. Contoh : 1.567.000.000</p>
            </form>
        </div>
    </div>

    <br>
    <h5 class="mb-0">Data Tabel Rasio RI</h5>
    <table class="table table-bordered table-striped">
        <tr class="text-center">
            <th>Nama Saham</th>
            <th>Jml Beredar Awal</th>
            <th>Jml Diterbitkan</th>
            <th>Total</th>
            <th>Rasio RI</th>
            <th>Aksi</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->nama_saham }}</td>
            <td>{{ number_format($product->beredar_awal, 0, ',', '.') }}</td>
            <td>{{ number_format($product->beredar_tambahan, 0, ',', '.') }}</td>
            <td>{{ number_format($product->beredar_total, 0, ',', '.') }}</td>
            <td>
                <p>{{ (float) $product->rasio_kiri }} : {{ (float) $product->rasio_kanan }}</p>
            </td>
            <td>
                <form action="{{ route('rasio.delete', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf @method('DELETE')
                    <button class="badge btn btn-danger border-0 px-1 py-1 rounded-pill btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection