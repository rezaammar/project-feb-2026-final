@extends('layouts.appadmin')

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
            <h5 class="mb-2">Update User Status ( Cek Bukti Bayar )</h5>
            <h6>User Id : {{ $status->user_id }}</h6>
            <h6>Username : {{ $status->username }}</h6>
            <h6>Email : {{ $status->email }}</h6>
            <h6>Status sebelumnya : {{ $status->status }}</h6>
            <h6>Exp Date sebelumnya : {{ $status->end_date }}</h6>
        </div>

        <form action="{{ route('admin.update.user', $status->user_id) }}" method="POST" onsubmit="return confirm('Yakin udah cek bukti bayar?')">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    {{-- Status Radio Button --}}
                    <div class="mb-3">
                        <label class="form-label d-block">Status</label>

                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="status" 
                                value="Active"
                                required
                            >
                            <label class="form-check-label">Active</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="status" 
                                value="Non-active"
                            >
                            <label class="form-check-label">Non-active</label>
                        </div>
                    </div>
                    {{-- Input Tanggal --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Expayed Date</label>
                        <input 
                            type="date" 
                            name="tanggal" 
                            class="form-control"
                            value="{{ old('tanggal', $status->end_date) }}"
                            required
                        >
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label>Expayed Date</label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ old('phone', Auth::user()->status->phone) }}">
                    </div> --}}

                    

                </div>
            </div>

            <div class="card-footer bg-white text-end">
                <a href="/admin/datauser" class="btn btn-secondary btn-sm">Kembali</a>
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