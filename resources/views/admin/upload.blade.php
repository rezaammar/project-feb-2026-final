@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ERROR UMUM --}}
    @if(session('error'))
        <p style="color:red;">
            {{ session('error') }}
        </p>
    @endif

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Upload Gambar (Admin)</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Judul:</label><br>
                <input type="text" name="title"><br><br>

                <label>Pilih Gambar:</label><br>
                <input type="file" name="image" required><br><br>

                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

    <h3>Daftar Gambar</h3>

    @foreach(\App\Models\Image::latest()->get() as $img)
    <div style="margin-bottom:20px; border:1px solid #ccc; padding:10px;">
        <h4>{{ $img->title }}</h4>

        <img src="{{ asset('storage/' . $img->image_path) }}" width="150"><br><br>

        <form action="{{ route('admin.image.delete', $img->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('Yakin ingin hapus gambar ini?')">
                Hapus
            </button>
        </form>
    </div>
    @endforeach

</div>
@endsection