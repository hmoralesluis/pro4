  <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow color-bg fadeInUp">
        <div class="container">
            <div class="carousel-holder " >


                <div id="owl-brands" class="owl-carousel brands-carousel">
                    @foreach($brands as $brand)
                        <div class="carousel-item">
                                <img  class="img-responsive" src="{{url('catalog/images/brands/' . $brand->image)}}" alt="" />
                        </div><!-- /.carousel-item -->
                    @endforeach
                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->





  <!-- ========================================= TOP BRANDS ========================================= -->
  <section id="top-brands" class="wow color-bg fadeInUp">
      <div class="container">

          <div class="carousel-holder " >
              {!! HTML::script('shop/assets/js/slider-maker.js') !!}

              <div id="jssor_1" style="   position: static;  margin: 0 auto; top: 50px; left: -200px;  width: 700px; height: 100px; overflow: hidden; visibility: hidden;">

                  <div data-u="slides" style=" cursor: default; position: static; top: 20px; left: 90px;   width: 1000px; height: 100px; overflow: hidden;   " >

                      @foreach($brands as $brand)
                      <div  style="display: none;">
                          <img   data-u="image" src="{{url('catalog/images/brands/' . $brand->image)}}" />
                      </div>
                      @endforeach

                  </div>
              </div>
              <script>jssor_1_slider_init();</script><!-- #endregion Jssor Slider End -->



          </div><!-- /.carousel-holder -->
      </div><!-- /.container -->
  </section><!-- /#top-brands -->
  <!-- ========================================= TOP BRANDS : END ========================================= -->