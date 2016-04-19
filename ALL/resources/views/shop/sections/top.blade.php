<!-- ============================================================= TOP NAVIGATION ============================ -->


<!-- ===============navbar navbar-default navbar-fixed-top ==================== HEADER ================================== -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        <div class="row">
        <!-- ============================================================= TOP NAVIGATION ============================== -->
        <nav class="top-bar animate-dropdown navbar navbar-right">
            <div class="container">

                    <ul id="t_menu" role="menu">
                        <li><a href="{{url('/')}}">{{ trans('index.menu.home') }}</a></li>
                        <li><a href="{{url('about')}}">{{ trans('index.menu.about_us') }}</a></li>
                        <li><a href="{{url('services')}}">{{ trans('index.menu.services') }}</a></li>
                        <li><a href="{{url('contact')}}">{{ trans('index.menu.contact') }}</a></li>
                        @if(\App::getLocale() == 'en')
                            <li class="dropdown">
                                <a class="dropdown-toggle"  data-toggle="dropdown" href="{{ url('lang', ['en']) }}"><img alt="en" src="{{url('shop/assets/images/flags/en.png')}}" width="24" height="18"> English</a>
                                <ul class="dropdown-menu" role="menu" >
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lang', ['es']) }}"> <img alt="es" src="{{url('shop/assets/images/flags/es.png')}}" width="24" height="18"> Español</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle"  data-toggle="dropdown" href="{{ url('lang', ['es']) }}"><img alt="es" src="{{url('shop/assets/images/flags/es.png')}}" width="24" height="18"> Español</a>
                                <ul class="dropdown-menu" role="menu" >
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lang', ['en']) }}"> <img alt="en" src="{{url('shop/assets/images/flags/en.png')}}" width="24" height="18"> English</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>

            </div><!-- /.container -->
        </nav><!-- /.top-bar -->

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img alt="logo" src="{{url('shop/assets/images/logo.png')}}" width="350" height="90"/>
                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->
            </div><!-- /.logo-holder -->


            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 top-search-holder no-margin">
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">

                    <form method="get" action="{{url('/search')}}">
                        <div class="control-group">
                            <input name="search" class="search-field" placeholder="{{trans('index.search')}}" />
                            <button type="submit" class="le-button huge search-button"></button>
                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->

            </div><!-- /.top-search-holder -->


                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 top-cart-row no-margin">
                        <div class="contact-row">
                            <div class="phone inline">
                                <i class="fa fa-phone"></i> Tel: +34 938771199
                            </div>
                            <div class="contact inline">
                                <i class="fa fa-envelope"></i> info@<span class="le-color">novateksilar.com</span>
                            </div>
                        </div><!-- /.contact-row -->
                        <!-- ============================================================= SHOPPING CART DROPDOWN : END  -->
                    </div><!-- /.top-cart-row -->

                    <div id="second" class="col-xs-12 col-sm-6 col-md-3  col-lg-2 top-cart-row ">
                        <div class="contact-row">
                            <div class="phone inline">
                                <i class="fa fa-phone"></i> Fax: +34 938771714
                            </div>

                            <div class="contact inline">
                                <i class="fa fa-envelope"></i> mateu-export@<span class="le-color">cambrescat.es</span>
                            </div>
                        </div><!-- /.contact-row -->
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END  -->
                    </div><!-- /.top-cart-row -->
        </div>
        <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->
        </div>

    </div><!-- /.container -->

    <!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
    <div class="container">
        <div class="row">
            <div class="yamm navbar">
                <div class="navbar-collapse" >
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" id="mc-horizontal-menu-collapse" class="collapse dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><h3><i class="glyphicon glyphicon-list"> </i> {{trans('index.menu.manufactures')}} </h3></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row-fluid">
                                            @for($i = 0; $i < 5; $i++ )
                                                <div class="col-xs-12 col-sm-3">
                                                    <h2></h2>
                                                    <ul>
                                                        @for($j = $i * 28; $j < ($i * 28) + 28 && $j < count($categories); $j++ )
                                                            <li><a href="{{url('category/'. $categories[$j]->id)}}">{{$categories[$j]->name}}</a></li>
                                                        @endfor
                                                    </ul>
                                                </div> <!--end col-->
                                            @endfor
                                        </div><!-- /.row -->
                                    </div><!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>
                        <li class="subtitle "><div class="row"><span class="col-md-10 col-sm-6 col-xs-12 menu-subtitle pull-right">{{trans('index.top.subtitle')}}</span></div></li>
                    </ul><!-- /.navbar-nav -->
                </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
        </div>
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->

</header>
