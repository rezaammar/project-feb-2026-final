@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        {{-- Fitur menuju grup Telegram --}}
        <div>
            <div class="card card-body text-center">
                <h5>Masuk Grup Komunitas Telegram Gratis</h5>

                <div class="d-flex align-items-center justify-content-center">
                    <form action="https://t.me/+HyYdl_175vBkYThl" method="">
                    @csrf
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">
                            Join Grup
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection