@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    
    <div class="card border-0 shadow-sm">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
        <div class="card-body">
            <div class="alert alert-success" role="alert">
            {{ session('success') }}
            </div>
        </div>
        @endif
        <a href="{{ route('profile.index') }}" style="width: 7em" class="btn btn-secondary mb-2 btn-sm">Kembali</a>
        <form action="{{ route('user-status.update-photo', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Foto Profile</label>
                <input type="file" name="photo" class="form-control">
            </div>

            {{-- PREVIEW FOTO --}}
            @if(Auth::user()->status->avatar)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . Auth::user()->status->avatar) }}" width="120" class="rounded">
                </div>
            @endif

            <button type="submit" class="btn btn-success">Update Foto</button>
        </form>
    </div>

</div>
@endsection