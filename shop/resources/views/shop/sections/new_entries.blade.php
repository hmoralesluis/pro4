 <!-- ========================================= CONTENT ========================================= -->
 <section id="recommended-products" class="carousel-holder hover small">

    <div class="title-nav">
        <h2 class="inverse">Nuevos productos</h2>
        <div class="nav-holder">
            <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
            <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
        </div>
    </div><!-- /.title-nav -->

    <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
        @foreach($lasted as $p)
            <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon red"><span>new</span></div>
                <div class="image">
                    <img  class="img-responsive" src="{{url('catalog/images/' . $p->image)}}" alt="" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="{{url('product/details/'. $p->id)}}">{{$p->part_number}}</a>
                    </div>
                    <div class="brand">{{$p->mark}}</div>
                </div>

                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="single-product.html" class="le-button">Detalles</a>
                    </div>
                </div>
            </div>
        </div><!-- /.carousel-item -->
        @endforeach



    </div><!-- /#recommended-products-carousel .owl-carousel -->
</section><!-- /.carousel-holder -->