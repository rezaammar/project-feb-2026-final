@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">

    {{-- BLOCK 1 : Avatar + Nama + Status --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <img src="{{ $user->avatar ?? asset('images/default-avatar.png') }}"
                     class="rounded-circle me-4"
                     width="90"
                     height="90"
                     style="object-fit: cover;">

                <div>
                    <h4 class="mb-1">{{ $user->username }}</h4>

                    @if(Auth::user()->status->status == 'Active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Not Active</span>
                    @endif
                </div>
            </div>

            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">
                Edit Profile
            </a>

        </div>
    </div>


    {{-- BLOCK 2 : Detail --}}
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">User Information</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Email</label>
                    <p class="fw-bold">{{ $user->email }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Phone</label>
                    <p class="fw-bold">{{ Auth::user()->status->phone ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="text-muted">Bio</label>
                    <p class="fw-bold">{{ Auth::user()->status->bio ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="text-muted">Address</label>
                    <p class="fw-bold">{{ Auth::user()->status->address ?? '-' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Expired Subscription</label>
                    <p class="fw-bold">
                        {{ Auth::user()->status->end_date ? \Carbon\Carbon::parse(Auth::user()->status->end_date)->format('d M Y') : '-' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection