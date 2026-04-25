@extends('layouts.app')

@section('content')


<div class="container-fluid">
   
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Story, Akuisisi, Penambahan Modal, dan Ekspansi</h5>
        </div>    
    </div>

    <div class="gallery-container">
        @foreach($images as $img)
            <div class="card mb-2">
                <img src="{{ asset('storage/' . $img->image_path) }}" alt="gambar">

                <div class="card-body">
                    <div class="card-title">
                        {{ $img->title ?? 'Tanpa Judul' }}
                    </div>
                </div>
                <div class="card-footer text-muted fs-6">
                    Upload Date : {{ $img->created_at }}
                </div>
            </div>
            
        @endforeach
    </div>
</div>
@endsection