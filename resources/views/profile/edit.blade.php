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
        
        <div class="card-header bg-white">
            <h5 class="mb-0">Update Profile</h5>
        </div>

        <form action="{{ route('update.profile', $user->id) }}" method="POST" ">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    {{-- <div class="col-md-12 text-center mb-4">
                        <img src="{{ $user->avatar ?? asset('default-avatar.png') }}"
                             width="120"
                             class="rounded-circle mb-3"
                             style="object-fit: cover;">

                        <input type="file" name="avatar" class="form-control">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                               value="{{ old('name', $user->username) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', Auth::user()->status->phone) }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control" rows="3">{{ old('bio', Auth::user()->status->bio) }}</textarea>
                    </div>

                </div>
            </div>

            <div class="card-footer bg-white text-end">
                <a href="{{ route('profile.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm">Update</button>
            </div>
        </form>

        {{-- <form method="POST" action="/admin/buku/{{ $book->id }}/update-link">
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
        </form> --}}
    </div>

</div>
@endsection