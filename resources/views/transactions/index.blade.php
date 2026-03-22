@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3>Riwayat Transaksi</h3>
    <p>
        <a class="text-black" href="/dashboard2">Kembali</a>
    </p>

    {{-- <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Paket</th>
                <th>Status</th>
                <th>Metode</th>
                <th>Virtual Account</th>
                <th>Masa Aktif</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $trx)
            <tr>
                <td>{{ $trx->transaction_id }}</td>
                <td>{{ $trx->package->name ?? '-' }}</td>
                <td>
                    <span class="badge bg-{{ $trx->status == 'active' ? 'success' : 'warning' }}">
                        {{ $trx->status }}
                    </span>
                </td>
                <td>{{ $trx->payment_type ?? '-' }}</td>
                <td>{{ $trx->va_number ?? '-' }}</td>
                <td>
                    {{ $trx->start_date }} 
                    <br> s/d <br>
                    {{ $trx->end_date }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

<div>
    <h1>404</h1>
    <h3>NOT FOUND, NOT FOUND, NOT FOUND, NOT FOUND</h3>
</div>

@endsection