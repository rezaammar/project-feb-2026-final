@extends('layouts.app')

@section('content')


<div class="container-fluid">    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hitung Total Lot Setelah Tebus</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('hitungLotFinal') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Saham</label>
                    <input type="text" name="nama_saham" class="form-control" placeholder="" maxlength="4" style="text-transform:uppercase" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Dimiliki</label>
                    <input type="number" name="lot_awal" class="form-control" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lot Baru RI</label>
                    <input type="number" name="lot_tebus" class="form-control" placeholder="" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        Hasilkan
                    </button>
                </div>
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

</div>
@endsection