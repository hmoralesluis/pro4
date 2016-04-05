@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    {{trans('services.title.page')}}
@endsection

@section('main_content')

        <section id="what-can-we-do-for-you" class="   light-bg inner-sm">

            <div class="container">
                <div class="row">
                    <div id="main-service" class="col-md-3 section service-summary m-t-0">
                        <h2>MATEU EXPORT S.L.</h2>
                        <p>{{trans('services.content1.section1')}}</p>

                            <p>{{trans('services.content2.section1')}}<h4>{{trans('services.title1.section1')}}</h4>
                        </p>
                    </div><!-- /.section -->

                    <div class="col-md-9">
                        <ul id="serv_content" class="services list-unstyled row m-t-35">
                            <li class="col-md-4">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-fax"></i></div>
                                    <h3>{{trans('services.box1.section1')}}</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section1">{{trans('index.button.details')}}</a></div>
                                </div>
                            </li>
                            <li class="col-md-4 ">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-cogs"></i></div>
                                    <h3>{{trans('services.box2.section1')}}</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section2">{{trans('index.button.details')}}</a></div>
                                </div>
                            </li>
                            <li class="col-md-4">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-thumbs-o-up"></i></div>
                                    <h3>{{trans('services.box3.section1')}}</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section3">{{trans('index.button.details')}}</a></div>
                                </div>

                            </li>
                        </ul><!-- /.services -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->

        </section><!-- /#what-can-we-do-for-you -->

        <section id="section1" class="  services-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg" >{{trans('services.title.section2')}} </h1>
                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/new_pieces.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->

                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>{{trans('services.content1.section2')}}</p>
                        <p>{{trans('services.content2.section2')}}</p>
                        <p>{{trans('services.content3.section2')}}</p>
                        <p>{{trans('services.content4.section2')}}</p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section id="section2" class="  services-content-light light-bg    inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" >  {{trans('services.title.section3')}} </h1>
                    <div class="col-md-8 section m-t-0">
                        <p>{{trans('services.content1.section3')}}</p>
                        <p>{{trans('services.content2.section3')}}</p>
                    </div><!-- /.section -->

                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/modern.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section id="section3" class=" services-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg">  {{trans('services.title.section4')}} </h1>

                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/clients.jpg')}}" alt="" class="profile-pic img-responsive">

                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>{{trans('services.content1.section4')}}</p>
                        <p>{{trans('services.content2.section4')}}</p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->


@endsection



