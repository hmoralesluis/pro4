@extends('shop.sections.master')

@section('title')
    Catalogo | Inicio
@endsection

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('main_content')
    @include('shop.sections.slider')
    @include('shop.sections.more_visits')
    @include('shop.sections.lasted')
@endsection

