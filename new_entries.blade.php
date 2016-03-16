 <!-- ========================================= CONTENT ========================================= -->
 <section id="recommended-products"  class="color-bg  fadeInUp">
    <div class="container">
        <div class="carousel-holder hover">
            <div class="title-nav">
            <h2 class="color-bg">Mas visitados</h2>
            <div class="nav-holder">
                <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
                <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
            </div>
        </div><!-- /.title-nav -->

            <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
        @foreach($most_visit as $p)
            <div class="no-margin carousel-item product-item-holder size-small hover">
            <div class="product-item">
                <div class="image">
                    <img  class="more_visit_img img-responsive" src="{{url('catalog/images/' . $p->image)}}" alt="" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="{{url('product/details/'. $p->id)}}">{{$p->part_number}}</a>
                    </div>
                    <div class="brand">{{$p->mark}}</div>
                </div>

                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="{{url('product/details/'. $p->id)}}" class="le-button">Detalles</a>
                    </div>
                </div>
            </div>
        </div><!-- /.carousel-item -->
        @endforeach



         </div><!-- /#recommended-products-carousel .owl-carousel -->
        </div>
    </div>
</section><!-- /.carousel-holder -->