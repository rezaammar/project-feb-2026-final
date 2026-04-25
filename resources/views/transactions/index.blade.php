@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3>Riwayat Transaksi</h3>

    <table class="table table-bordered mt-4 table-striped">
        <thead class="table-primary">
            <tr class="text-center">
                <th>Order ID</th>
                <th>Waktu Order</th>
                <th>Paket</th>
                <th>Duration</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $trx)
            <tr>
                <td>{{ $trx->transaction_id }}</td>
                <td>{{ $trx->created_at}}</td>
                <td>{{ $trx->package_id}}</td>
                <td>{{ $trx->duration }}</td>
                <td>{{ $trx->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection