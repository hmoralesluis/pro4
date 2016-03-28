@extends('shop.sections.master')

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Marca  | {{$mark}}
@endsection

@section('main_content')
    @include('shop.sections.products_list')
    @include('shop.sections.new_entries')
    @include('shop.sections.lasted')
@endsection
