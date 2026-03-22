@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Produk</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control"
                        value="{{ $product->name }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea 
                        name="description" 
                        class="form-control" 
                        rows="3" 
                        required
                    >{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control"
                        value="{{ $product->price }}"
                        required
                    >
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        ⬅ Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        🔄 Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
