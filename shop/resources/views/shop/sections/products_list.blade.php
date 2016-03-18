<section id="gaming"  class="color-bg wow fadeInUp">
    <div class="container">
        <h2 class="section-title">Productos de {{$category->name}}</h2>
        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane in active">
                <div class="product-grid-holder">
                    <div class="row no-margin">
                        @foreach($products as $prod)
                            <div class="col-xs-12 col-sm-2 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="image">
                                        <img class="product_image" src="{{url('catalog/images/' . $prod->image)}}" alt=" " />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="{{url('product/details/'. $prod->id)}}">{{$prod->part_number}}</a>
                                        </div>
                                        <div class="brand">{{$prod->mark}}</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="{{url('product/details/'. $prod->id)}}" class="le-button">Detalles</a>
                                        </div>
                                    </div>
                                </div><!-- /.product-item -->
                            </div><!-- /.product-item-holder -->
                        @endforeach


                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->
                <div class="pagination-holder">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12">
                            <ul>
                                {!! $products->render() !!}
                            </ul>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->
            </div><!-- /.products-grid #grid-view -->



        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->