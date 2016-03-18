<!-- ============================================================= TOP NAVIGATION ============================ -->
<!-- ============================================================= TOP NAVIGATION ============================== -->
<nav class="top-bar animate-dropdown navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="col-xs-12 col-sm-9 no-margin">
            <ul>
                <li><a href="{{url('/')}}">INICIO</a></li>
                <li><a href="{{url('contact')}}">CONTACTO</a></li>
            </ul>
        </div><!-- /.col -->

        <div class=" col-sm-offset-6 col-xs-12 col-sm-3 no-margin">
            <ul>
                <li><a href="{{url('about')}}">QUIENES SOMOS</a></li>
                <li><a href="{{url('services')}}">QUE OFRECEMOS</a></li>
            </ul>
        </div><!-- /.col -->



    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->


<!-- ============================================================= HEADER ================================== -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">

        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="{{url('/')}}">
                    <img alt="logo" src="{{url('shop/assets/images/logo.png')}}" width="233" height="54"/>
                </a>
            </div><!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->		</div><!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">

            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">

                <form method="get" action="{{url('/search')}}">
                    <div class="control-group">
                        <input name="search" class="search-field" placeholder="Buscar por numero de partes" />
                        <button type="submit" class="le-button huge search-button"></button>
                    </div>
                </form>
            </div><!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->

        </div><!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-3 pull-right  top-cart-row no-margin">
            <div class="contact-row">
                <div class="phone inline">
                    <i class="fa fa-phone"></i> Tel: +34938771199
                </div>
                <div class="contact inline">
                    <i class="fa fa-envelope"></i> info@<span class="le-color">novateksilar.com</span>
                </div>
            </div><!-- /.contact-row -->
            <!-- ============================================================= SHOPPING CART DROPDOWN : END  -->
        </div><!-- /.top-cart-row -->

    </div><!-- /.container -->

    <!-- ========================================= NAVIGATION ========================================= -->
<nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
    <div class="container">
        <div class="yamm navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                    <span class="sr-only">Navegador</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Fabricantes</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                     <div class="row-fluid">
                                           @for($i = 0; $i < 5; $i++ )
                                                <div class="col-xs-12 col-sm-3">
                                                 <h2></h2>
                                                    <ul>
                                                       @for($j = $i * 27; $j < ($i * 27) + 27 && $j < count($categories); $j++ )
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
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar -->
    </div><!-- /.container -->
</nav><!-- /.megamenu-vertical -->
<!-- ========================================= NAVIGATION : END ========================================= -->

</header>