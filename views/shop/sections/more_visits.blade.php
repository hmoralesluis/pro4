<!-- ========================================= BEST SELLERS ========================================= -->
<section id="bestsellers" class="color-bg wow fadeInUp">
	<div class="container">
		<h1 class="section-title color-bg">Mas visitados</h1>

		<div class="product-grid-holder medium">
			<div class="col-xs-12 col-md-7 no-margin">

				<div class=" best_box row no-margin">
                    @for($i = 1; $i <= 3; $i++ )
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class=" product-item">
                                <div class="image">
                                    <img  class="more_visit_img" src="{{url('catalog/images/' . $most_visit[$i]->image)}}" alt=" " />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="text-center title">
                                        <a href="{{url('product/details/'. $most_visit[$i]->id)}}">{{$most_visit[$i]->part_number}}</a>
                                    </div>
                                    <div class="text-center brand">{{$most_visit[$i]->mark}}</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{url('product/details/'. $most_visit[$i]->id)}}" class="le-button">Detalles</a>
                                    </div>

                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                    @endfor
				</div><!-- /.row -->

				<div class="row no-margin">
                    @for($i = 4; $i <= 6; $i++)
					    <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
						<div class="product-item">
							<div class="image">
                                <img class="more_visit_img" src="{{url('catalog/images/' . $most_visit[$i]->image)}}" alt=" " />
							</div>
							<div class="body">
								<div class="label-discount clear"></div>
								<div class="text-center title">
									<a href="{{url('product/details/'. $most_visit[$i]->id)}}">{{$most_visit[$i]->part_number}}</a>
								</div>
								<div class="text-center brand">{{$most_visit[$i]->mark}}</div>
							</div>

							<div class="hover-area">
								<div class="add-cart-button  ">
									<a href="{{url('product/details/'. $most_visit[$i]->id)}}" class="le-button">Detalles</a>
								</div>

							</div>
						</div>
					</div><!-- /.product-item-holder -->
                    @endfor


				</div><!-- /.row -->
			</div><!-- /.col -->
            <div class="row no-margin">
			    <div class="col-xs-12 col-md-5 no-margin">
				<div class="product-item-holder size-big single-product-gallery small-gallery ">

					<div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
						<div class="single-product-gallery-item" id="slide1">
							<a data-rel="prettyphoto" >
                                <img class="product_image" src="{{url('catalog/images/' . $most_visit[0]->image)}}" alt=" " />
							</a>
						</div><!-- /.single-product-gallery-item -->
					</div><!-- /.single-product-slider -->

					<div class="body ">
						<div class="label-discount clear"></div>
						<div class="title text-center">
							<a href="{{url('product/details/'. $most_visit[0]->id)}}">{{ $most_visit[$i]->part_number}}</a>
						</div>
						<div class="brand text-center">{{ $most_visit[$i]->mark}}</div>

                        <div class="prices text-center">

                            <a href="{{url('product/details/'. $most_visit[0]->id)}}" class="le-button big inline">Detalles</a>
                        </div>

					</div>
				</div><!-- /.product-item-holder -->
			</div><!-- /.col -->

            </div>

		</div><!-- /.product-grid-holder -->
	</div><!-- /.container -->
</section><!-- /#bestsellers -->
<!-- ========================================= BEST SELLERS : END ========================================= -->