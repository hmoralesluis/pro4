@extends('shop.sections.master')

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Categoria  | {{$category->name}}
@endsection

@section('main_content')
    @include('shop.sections.products_list')
    @include('shop.sections.lasted')
    @include('shop.sections.more_visits')
@endsection
