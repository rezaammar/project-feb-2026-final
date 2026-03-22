@extends('layouts.main')

@section('container')
    <h1>Ini adalah post</h1>

    @foreach ($posts as $post)
        <h5>Nama : {{ $post['pasukan'] }}</h5>
        <p>Penjelasan : {{ $post['body'] }}</p>
    @endforeach

    <a href="http://127.0.0.1:8000/single/garuda">Data 1</a>
    <a href="http://127.0.0.1:8000/single/banteng">Data 2</a>
    
    

@endsection