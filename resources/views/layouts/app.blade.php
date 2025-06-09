@vite(['resources/js/app.js', 'resources/sass/app.scss'])
@extends('layouts.base')

@section('body')
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
