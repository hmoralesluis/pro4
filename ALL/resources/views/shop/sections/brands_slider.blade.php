
  <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow color-bg fadeInUp">
        <div class="container">

            <div class=" row carousel-holder " >
                {!! HTML::script('shop/assets/js/slider-maker.js') !!}
                <div  id="jssor_1" style="position: relative;  margin: 0 auto; top: 0px; left: -200px;  width: 700px; height: 100px; ">

                    <div id="jm" data-u="slides" style="  cursor: default; position: relative; top: 0px; left: 20px;  height: 100px;  " >

                        @foreach($brands as $brand)
                            <div  style=" display: none;">
                                <img  class="img-responsive" style="padding-left:10px;" data-u="image" src="{{url('catalog/images/brands/' . $brand->image)}}" />
                            </div>
                        @endforeach

                    </div>
                </div>
                <script>jssor_1_slider_init();</script><!-- #endregion Jssor Slider End -->


            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->