@extends('shop.sections.master')
@section('title')
    {{trans('index.product.details.title')}} | {{$product->part_number}}
@endsection

@section('top_header')
    @include('shop.sections.top')
@endsection

@section('main_content')
    <div id="single-product" class="row">
        </br>
        <div class="container">
            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <img  class="img-responsive" src="{{url('catalog/images/' . $product->image)}}" alt="" />
            </div><!-- /.gallery-holder -->

            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">
                    <div class="title"><a><b>{{trans('index.table.part_number')}}: </b>{{$product->part_number}}</a></div>
                    <div class="brand"><p><b>{{trans('index.table.mark')}}: </b>{{$product->mark}}</p></div>
                    <div class="category"><b>{{trans('index.manufacture')}}: </b><a href="{{url('category/'. $category->id)}}">{{$category->name}}</a></div>                      

                    <div class="excerpt">
                        <b>{{trans('index.table.description')}}: </b><p>{{$product->description}}</p>
                    </div>
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div>
    </div><!-- /.row #single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">

        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple" >
                    <li class="active"><a href="#reviews" data-toggle="tab">{{trans('index.impressions')}} ({{count($opinions)}})</a></li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    <div class="tab-pane active" id="reviews">
                        <div class="comments">
                            <div class="comment-item">
                                <div class="row no-margin">
                                    @foreach($opinions as $opinion)
                                        <div class="col-lg-2 col-xs-12 col-sm-3 no-margin">
                                            <div class="avatar">
                                                <a href="#" class="bold">{{$opinion->guest_name}}</a>
                                            </div><!-- /.avatar -->
                                        </div><!-- /.col -->
                                        <div class="col-xs-12 col-lg-10 col-sm-9 ">
                                            <div class="comment-body">
                                                <div class="meta-info">

                                                    <div class="date inline">
                                                        {{$opinion->created_at}}
                                                    </div>
                                                </div><!-- /.meta-info -->
                                                <p class="comment-text">
                                                    {{$opinion->opinion}}
                                                </p><!-- /.comment-text -->
                                            </div><!-- /.comment-body -->

                                        </div><!-- /.col -->
                                    @endforeach

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->
                        </div><!-- /.comments -->

                        <div class="add-review row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="new-review-form">
                                    <h2>{{trans('index.add_comment')}}</h2>


                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> {{trans('index.impression_errors')}}<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form id="contact-form" class="contact-form" method="post"  action="{{url('product/opinion/add/'. $product->id)}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row field-row">
                                            <div class="col-xs-12 col-sm-6">
                                                <label>{{trans('contact_us.label.name')}}*</label>
                                                <input name="name" required="true" class="le-input" >
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label>{{trans('contact_us.label.email')}}*</label>
                                                <input name="email" type="email" required="true" class="le-input" >
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row">
                                            <label>{{trans('index.impression_content')}}</label>
                                            <textarea required="true" name="opinion" rows="8" class="le-input"></textarea>
                                        </div><!-- /.field-row -->

                                        <div class="buttons-holder">
                                            <button type="submit" class="le-button huge">{{trans('contact_us.button.send')}}</button>
                                        </div><!-- /.buttons-holder -->
                                    </form><!-- /.contact-form -->
                                </div><!-- /.new-review-form -->
                            </div><!-- /.col -->
                        </div><!-- /.add-review -->

                    </div><!-- /.tab-pane #reviews -->


                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
@endsection

