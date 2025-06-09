@vite(['resources/js/app.js', 'resources/css/app.css'])
@extends('layouts.base')

@section('body')
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
