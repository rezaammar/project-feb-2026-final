@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Update Profile</h5>
        </div>

        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 text-center mb-4">
                        <img src="{{ $user->avatar ?? asset('default-avatar.png') }}"
                             width="120"
                             class="rounded-circle mb-3"
                             style="object-fit: cover;">

                        <input type="file" name="avatar" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Username</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control" rows="3">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ old('address', $user->address) }}</textarea>
                    </div>

                </div>
            </div>

            <div class="card-footer bg-white text-end">
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>

</div>
@endsection