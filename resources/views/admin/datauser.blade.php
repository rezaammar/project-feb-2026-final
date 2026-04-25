@extends('layouts.appadmin')

@section('content')

<div class="container mt-5">

    <h3>Data User</h3>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('admin.datauser') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                placeholder="Cari email..." value="{{ $search }}">
            <button class="btn btn-primary">Search</button>
        </div>
    </form>

    {{-- TABLE --}}
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>User Id</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Expayed-Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->status->username ?? '-' }}</td>
                    <td>{{ $user->status->phone ?? '-' }}</td>
                    <td>{{ $user->status->status ?? '-' }}</td>
                    <td>{{ $user->status->end_date ?? '-' }}</td>
                    <td>
                        {{-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a> --}}
                        <form action="{{ route('admin.edit.user', $user->id) }}" method="GET" style="display:inline" >
                            @csrf
                            <button class="badge btn btn-success border-0 px-1 py-1 rounded-pill btn-delete">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- 🔥 PAGINATION --}}
    {{-- {{ $users->links() }} --}}
    <div class="mt-3">
    {{ $users->appends(request()->query())->links() }}
    </div>

</div>


@endsection