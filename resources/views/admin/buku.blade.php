@extends('layouts.appadmin')

@section('content')
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<div class="container mt-2">

    <div class="p-3 mb-2 bg-light rounded-3 border shadow-sm">
        <div class="container-fluid py-2">
            <h4 class="fs-3 fw-bold text-primary mb-1">Manage Buku untuk ditampilkan atau tidak</h4>
            <p class="fs-6 text-secondary mb-3">
                Collapse fitur buku di dashboard aplikasi ?
            </p>
            <hr class="my-2">
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/admin/toggle-collapse">
        @csrf

        <div class="form-check form-switch">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="collapse"
                onchange="this.form.submit()"
                {{ $isCollapsed == '1' ? 'checked' : '' }}
            >
            <label class="form-check-label">
                Collapse Section Buku Saham
            </label>
        </div>
    </form>    

    <br>
    <h3>Input Link Download Buku</h3>

    @if(session('link'))
        <div class="alert alert-success">
            {{ session('link') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/admin/buku/{{ $book->id }}/update-link">
        @csrf

        <div class="mb-3">
            <label class="form-label">Link Download</label>
            <input 
                type="url" 
                name="link" 
                class="form-control"
                value="{{ $book->link }}"
                placeholder="https://example.com/buku.pdf"
                required
            >
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>


    {{-- <form action="{{ route('admin.upload.buku') }}" method="POST" enctype="multipart/form-data">
                @csrf

        <label>Sampul Buku:</label><br>
        <input type="file" name="image" required><br><br>

        <button type="submit">Upload</button>
    </form> --}}
    {{-- <div class="gallery-container">
        
            <div class="card">
                <img src="{{ asset('storage/' . $book->link2) }}" alt="gambar">
            </div>
            
       
    </div> --}}
</div>


    {{-- Memanggil Sidebar tombol bawah mobile --}}
{{-- @include('partials._sidebar') --}}

@endsection