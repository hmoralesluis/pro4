<div id="top-banner-and-menu" class="homepage2">
    <!--container-->
    <div class="container" >
        <div class="col-xs-12">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider02.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left right" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    Lo nuevo de <span class="big"><span class="sign"></span>{{$slide[0]->mark}}</span>
                                </div>

                                <div class="excerpt fadeInDown-2">
                                    <br>
                                    disponible
                                    {{$slide[0]->part_number}}<br>
                                    100% seguro </br>
                                </div>
                                <div class="small fadeInDown-2">

                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="{{url('product/details/'. $slide[0]->id)}}" class="big le-button ">Detalles</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider04.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                <div class="big-text fadeInDown-1">
                                    Lo nuevo de <span class="big"><span class="sign"></span>{{$slide[1]->mark}}</span>
                                </div>

                                <div class="excerpt fadeInDown-2">
                                    <br>
                                    disponible
                                    {{$slide[1]->part_number}}<br>
                                    100% seguro </br>
                                </div>
                                <div class="small fadeInDown-2">

                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="{{url('product/details/'. $slide[1]->id)}}" class="big le-button ">Detalles</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider03.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                <div class="big-text fadeInDown-1">
                                    Lo nuevo de <span class="big"><span class="sign"></span>{{$slide[2]->mark}}</span>
                                </div>

                                <div class="excerpt fadeInDown-2">
                                    <br>
                                    disponible
                                    {{$slide[2]->part_number}}<br>
                                    100% seguro </br>
                                </div>
                                <div class="small fadeInDown-2">

                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="{{url('product/details/'. $slide[2]->id)}}" class="big le-button ">Detalles</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                </div><!-- /.owl-carousel -->
            </div>

            <!-- ========================================= SECTION – HERO : END ========================================= -->
        </div>
    </div>
</div><!-- /.homepage2 -->

<!-- ========================================= HOME BANNERS ========================================= -->
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="row marketing">
            <h5 class=" h1 text-center text-about-green">Nuestra empresa proporciona </br> partes,
                productos y piezas a los sistemas de control (PLC) instalados.</br>
                Nuestra misión es ayudarle a:
            </h5>
        </div>
        </br>
        <div class="col-xs-12 col-lg-3 no-margin  ">
             <div class="row">
                 <div class="col-xs-12"> <p>  <img class="marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round1.png" /></p></div>

                 <div class="col-xs-12"> <span class="text-center-home">Reducir sus costos de mantenimiento.</span> </div>
             </div>
        </div>

        <div class="col-xs-12 col-lg-3 no-margin  ">
            <div class="row">

                <div class="col-xs-12"><p><img class="marketing-image " alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round2.png" /> </p></div>

                    <div class="col-xs-12">   <p class="text-center-home ">Eficientemente migrar a la nueva tecnología.</p></div>
                    </div>
        </div>

        <div class="col-xs-12 col-lg-3 no-margin ">
            <div class="row">
            <div class="col-xs-12"> <p> <img class="marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round3.png" />  </p></div>
                <div class="col-xs-12">   <p class="text-center-home">Extender la vida útil de su sistema de control.</p></div>
            </div>

        </div>

        <div class="col-xs-12 col-lg-3 no-margin ">
            <div class="row">
            <div class="col-xs-12"> <p> <img class=" marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round4.png" /> </p></div>

                <div class="col-xs-12"> <p class="text-center-home">Reducir los tiempos de interrupción de cualquier sistema de control.</p></div>
            </div>
        </div>

    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->