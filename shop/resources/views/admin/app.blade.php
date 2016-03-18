<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('main_title')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->
    {!! HTML::style('admin/assets/css/bootstrap.min.css') !!}
    {!! HTML::style('admin/assets/css/bootstrap-responsive.min.css') !!}
    {!! HTML::style('admin/assets/css/font-awesome.min.css') !!}
     {!! HTML::style('admin/assets/css/custom.css') !!}




    <!--[if IE 7]>

    {!! HTML::style('admin/assets/css/font-awesome-ie7.min.css') !!}
    <![endif]-->

    <!--page specific plugin styles-->

    @yield('styles')
    <!--fonts-->

   <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->

    <!--ace styles-->


    {!! HTML::style('admin/assets/css/ace.min.css') !!}
    {!! HTML::style('admin/assets/css/ace-responsive.min.css') !!}
    {!! HTML::style('admin/assets/css/ace-skins.min.css') !!}

    <link rel="shortcut icon" href="{{url('admin/assets/images/favicon.ico')}}">


    <!--[if lte IE 8]>
    <link rel="stylesheet" href="admin/ssets/css/ace-ie.min.css" />
    <![endif]-->

    <!--inline styles if any-->
</head>

@yield('body')
</html>
