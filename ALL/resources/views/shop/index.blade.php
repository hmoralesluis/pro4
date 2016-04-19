@extends('shop.sections.master')

@section('title')
    {{trans('index.menu.home')}}
@endsection

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('main_content')
    @include('shop.sections.slider')
    @include('shop.sections.new_entries')
    @include('shop.sections.lasted')
@endsection

