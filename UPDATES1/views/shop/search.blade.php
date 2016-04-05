@extends('shop.sections.master')

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    {{trans('index.search.result')}}
@endsection

@section('main_content')
    <section id="gaming">
        <div class="container">
            <div class="grid-list-products">
                <h2 class="section-title">{{trans('index.search.result')}}</h2>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> {{trans('index.search.can_not')}}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>


                @else
                    @if(count($products) == 0)
                        <p>{{trans('index.search.sorry')}}</p>
                    @else
                        <div class="tab-content">

                            <div id="list-view" class="products-grid fade tab-pane in active ">
                                <div class="products-list">

                                    @foreach($products as $prod)
                                        <div class="product-item product-item-holder">
                                            <div class="row">
                                                <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                    <div class="image">
                                                        <img class="product_image" src="{{url('catalog/images/' . $prod->image)}}" alt=" " />
                                                    </div>
                                                </div><!-- /.image-holder -->
                                                <div class="no-margin col-xs-12 col-sm-8 body-holder">
                                                    <div class="body">

                                                        <div class="title">
                                                            <a href="{{url('product/details/'. $prod->id)}}">{{$prod->part_number}}</a>
                                                        </div>
                                                        <div class="brand">{{$prod->mark}}</div>
                                                        <div class="excerpt">
                                                            <p>{{$prod->description}}</p>
                                                        </div>
                                                        <div class="addto-compare">
                                                            <a class="le-button" href="{{url('product/details/'. $prod->id)}}">{{trans('index.button.details')}}</a>
                                                        </div>
                                                    </div>
                                                </div><!-- /.body-holder -->
                                            </div><!-- /.row -->
                                        </div><!-- /.product-item -->
                                    @endforeach




                                </div><!-- /.products-list -->

                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 text-left">
                                            <ul>
                                                {!! $products->render() !!}
                                            </ul><!-- /.pagination -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->

                            </div><!-- /.products-grid #list-view -->

                        </div><!-- /.tab-content -->
                    @endif
            </div><!-- /.grid-list-products -->
        </div>

        @endif

    </section><!-- /#gaming -->
    @include('shop.sections.new_entries')
    @include('shop.sections.lasted')
@endsection

