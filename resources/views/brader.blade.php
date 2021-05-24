@extends('layouts.app')

@section('content')
    <h1>Kampreto</h1>

    @foreach ($data as $kampret)
        @php
        $kampret = (object) $kampret;
        @endphp
        
        <h1>{{ $kampret->judul }}</h1>
    @endforeach
@endsection