@extends('layouts.app')

@section('content')
<h2>Data Produk</h2>

<a href="/products/create" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Hapus</button>
                
            </form>
        </td>
    </tr>
    @endforeach
</table>


@endsection
