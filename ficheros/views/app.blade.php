<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta -->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="Mateu, export, eCommerce">
    <meta name="robots" content="all">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    {!! HTML::style('shop/assets/css/bootstrap.min.css') !!}


    <!-- Customizable CSS -->
    {!! HTML::style('shop/assets/css/main.css') !!}
    {!! HTML::style('shop/assets/css/dark-green.css') !!}
    {!! HTML::style('shop/assets/css/owl.carousel.css') !!}
    {!! HTML::style('shop/assets/css/owl.transitions.css') !!}
    {!! HTML::style('shop/assets/css/animate.min.css') !!}


    <!-- Fonts
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'> -->

    <!-- Icons/Glyphs -->

    {!! HTML::style('shop/assets/css/font-awesome.min.css') !!}

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('shop/assets/images/favicon.ico')}}">

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>

    {!! HTML::script('shop/assets/js/html5shiv.js') !!}
    {!! HTML::script('shop/assets/js/respond.min.js') !!}

    <![endif]-->
</head>
<body>

<div class="wrapper">
    @yield('content')
</div><!-- /.wrapper -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
{!! HTML::script('shop/assets/js/jquery-1.10.2.min.js') !!}
{!! HTML::script('shop/assets/js/jquery-migrate-1.2.1.js') !!}
{!! HTML::script('shop/assets/js/bootstrap.min.js') !!}
{!! HTML::script('shop/assets/js/gmap3.min.js') !!}
{!! HTML::script('shop/assets/js/bootstrap-hover-dropdown.min.js') !!}
{!! HTML::script('shop/assets/js/owl.carousel.min.js') !!}
{!! HTML::script('shop/assets/js/css_browser_selector.min.js') !!}
{!! HTML::script('shop/assets/js/echo.min.js') !!}
{!! HTML::script('shop/assets/js/jquery.easing-1.3.min.js') !!}
{!! HTML::script('shop/assets/js/bootstrap-slider.min.js') !!}
{!! HTML::script('shop/assets/js/jquery.raty.min.js') !!}
{!! HTML::script('shop/assets/js/jquery.prettyPhoto.min.js') !!}
{!! HTML::script('shop/assets/js/jquery.customSelect.min.js') !!}
{!! HTML::script('shop/assets/js/wow.min.js') !!}
{!! HTML::script('shop/assets/js/scripts.js') !!}


</body>
</html>