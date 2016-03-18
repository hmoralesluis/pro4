@extends('app')

@section('content')
    @yield('top_header')
    @yield('main_content')
    @include('shop.sections.brands_slider')
    @include('shop.sections.footer')
@endsection