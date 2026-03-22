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
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hitung Harga Average Setelah Tebus</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hitungAverageFinal') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Saham</label>
                    <input type="text" name="nama_saham" class="form-control" placeholder="" maxlength="4" style="text-transform:uppercase" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Harga Awal</label>
                    <input type="number" name="harga_avg" class="form-control" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Awal</label>
                    <input type="number" name="lot_awal" class="form-control" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tebus</label>
                    <input type="number" name="harga_tebus" class="form-control" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Baru dari RI</label>
                    <input type="number" name="lot_tebus" class="form-control" placeholder="" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan dan Hasilkan
                    </button>
                </div>
                <p class="small">Note : Maksimal data ditambahkan hanya 5 data</p>
            </form>
        </div>
    </div>

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

    <br>
    <h5 class="mb-0">Data Tabel Harga Avg setelah Right Issue</h5>
    <table class="table table-bordered">
        <tr>
            <th>Nama Saham</th>
            <th>Harga Awal</th>
            <th>Lot Awal</th>
            <th>Harga Tebus</th>
            <th>Lot Baru RI</th>
            <th>Harga Avg Final</th>
            <th>Aksi</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->nama_saham }}</td>
            <td>{{ (float) $product->harga_avg }}</td>
            <td>{{ (float) $product->jumlah_lot }}</td>
            <td>{{ (float) $product->harga_tebus }}</td>
            <td>{{ (float) $product->lot_tebus }}</td>
            <td>{{ (float) $product->harga_avg_final }}</td>
            <td>
                <form action="{{ route('tebusri.delete', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf @method('DELETE')
                    <button class="badge btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection