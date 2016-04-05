<div id="top-banner-and-menu" class="homepage2">
    <!--container-->
    <div class="container" >
        <div class="row">
            <div class="col-xs-12">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel height-sm owl-inner-nav owl-ui-md">

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider01.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-right right" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    @if(session('lang') == 'es')
                                        <span class="big">{{trans('index.slide.big_text')}} </span> <span class="medium"><span class="sign"></span> repuestos para automatización </br> industrial  en todo el mundo</span>
                                    @elseif(session('lang') == 'en')
                                        <span class="big">{{trans('index.slide.big_text1')}} {{trans('index.slide.big_text2')}} <p>{{trans('index.slide.big_text3')}}  </p></span>
                                    @endif
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider03.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left left" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    @if(session('lang') == 'es')
                                        <span class="big">{{trans('index.slide.big_text')}} </span> <span class="medium"><span class="sign"></span> repuestos para automatización </br> industrial  en todo el mundo</span>
                                    @elseif(session('lang') == 'en')
                                        <span class="big">{{trans('index.slide.big_text1')}} {{trans('index.slide.big_text2')}} <p>{{trans('index.slide.big_text3')}}  </p></span>
                                    @endif
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider02.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-right right" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    @if(session('lang') == 'es')
                                        <span class="big">{{trans('index.slide.big_text')}} </span> <span class="medium"><span class="sign"></span> repuestos para automatización </br> industrial  en todo el mundo</span>
                                    @elseif(session('lang') == 'en')
                                        <span class="big">{{trans('index.slide.big_text1')}} {{trans('index.slide.big_text2')}} <p>{{trans('index.slide.big_text3')}}  </p></span>
                                    @endif
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->


                    <div class="item" style="background-image: url(shop/assets/images/sliders/slider04.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left left" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    @if(session('lang') == 'es')
                                        <span class="big">{{trans('index.slide.big_text')}} </span> <span class="medium"><span class="sign"></span> repuestos para automatización </br> industrial  en todo el mundo</span>
                                    @elseif(session('lang') == 'en')
                                        <span class="big">{{trans('index.slide.big_text1')}} {{trans('index.slide.big_text2')}} <p>{{trans('index.slide.big_text3')}}  </p></span>
                                    @endif
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->



                </div><!-- /.owl-carousel -->
            </div>

            <!-- ========================================= SECTION – HERO : END ========================================= -->
        </div>
        </div>
    </div>
</div><!-- /.homepage2 -->

<!-- ========================================= HOME BANNERS ========================================= -->
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="row marketing">
            <h5 class=" h3 text-center text-about-green">
                <p>{{trans('index.body.provider1')}}</p>
                <p>{{trans('index.body.provider2')}}</p>
                <p>{{trans('index.body.provider3')}}</p>
            </h5>
        </div>
        </br>
        <div class="col-xs-12 col-lg-3 no-margin  ">
             <div class="row">
                 <div class="col-xs-12"> <p>  <img class="marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round1.png" /></p></div>

                 <div class="col-xs-12"> <span class="text-center-home"> {{trans('index.body.mision1')}} </span> </div>
             </div>
        </div>

        <div class="col-xs-12 col-lg-3 no-margin  ">
            <div class="row">

                <div class="col-xs-12"><p><img class="marketing-image " alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round2.png" /> </p></div>

                    <div class="col-xs-12">   <p class="text-center-home ">{{trans('index.body.mision2')}} </p></div>
                    </div>
        </div>

        <div class="col-xs-12 col-lg-3 no-margin ">
            <div class="row">
            <div class="col-xs-12"> <p> <img class="marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round3.png" />  </p></div>
                <div class="col-xs-12">   <p class="text-center-home">{{trans('index.body.mision3')}} </p></div>
            </div>

        </div>

        <div class="col-xs-12 col-lg-3 no-margin ">
            <div class="row">
            <div class="col-xs-12"> <p> <img class=" marketing-image" alt="" src="shop/assets/images/blank.gif" data-echo="shop/assets/images/banners/round4.png" /> </p></div>

                <div class="col-xs-12"> <p class="text-center-home">{{trans('index.body.mision4')}} </p></div>
            </div>
        </div>

    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->

<script type="text/javascript">
    $('#owl-main').carousel({
        interval: 2000,
        wrap: true
    })


</script>
