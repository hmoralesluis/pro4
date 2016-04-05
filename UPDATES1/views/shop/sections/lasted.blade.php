<section id="recently-reviewd" class="fadeInUp">
    <div class="container">
        <div class="row carousel-holder hover">
            <div class="title-nav">
                <h2 class="h1">{{trans('index.section.new_products')}}</h2>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->

            <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                @foreach($lasted as $last)
                    <div class="no-margin carousel-item product-item-holder size-small hover">
                    <div class="product-item">
                        <div class="ribbon green"><span>{{trans('index.new')}}</span></div>
                        <div class="image">
                            <img class="more_visit_img" src="{{url('catalog/images/' . $last->image)}}" alt=" " />
                        </div>
                        <div class="body">
                            <div class="title">
                                <a href="{{url('product/details/'. $last->id)}}">{{$last->part_number}}</a>
                            </div>
                            <div class="brand">{{$last->mark}}</div>
                        </div>

                        <div class="hover-area">
                            <div class="add-cart-button">
                                <a href="{{url('product/details/'. $last->id)}}" class="le-button">{{trans('index.button.details')}}</a>
                            </div>
                        </div>
                    </div><!-- /.product-item -->
                </div><!-- /.product-item-holder -->
                @endforeach


            </div><!-- /#recently-carousel -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#recently-reviewd -->
