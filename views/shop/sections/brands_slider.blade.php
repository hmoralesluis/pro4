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