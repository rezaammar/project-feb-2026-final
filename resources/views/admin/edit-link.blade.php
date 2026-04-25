@extends('layouts.appadmin')

@section('content')

<h3>Input Link Download Buku</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="/admin/settings/{{ $setting->id }}/update-link">
    @csrf

    <div class="mb-3">
        <label class="form-label">Link Download</label>
        <input 
            type="url" 
            name="link" 
            class="form-control"
            value="{{ $setting->link }}"
            placeholder="https://example.com/buku.pdf"
            required
        >
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection