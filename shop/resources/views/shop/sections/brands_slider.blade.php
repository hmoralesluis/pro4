  <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >

                <div class="title-nav">
                    <h1>Marcas patrosinadoras</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-brands" class="owl-carousel brands-carousel">
                    @foreach($brands as $brand)
                        <div class="carousel-item">
                            <a href="#">
                                <img  class="img-responsive" src="{{url('catalog/images/brands/' . $brand->image)}}" alt="" />
                            </a>
                        </div><!-- /.carousel-item -->
                    @endforeach
                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->