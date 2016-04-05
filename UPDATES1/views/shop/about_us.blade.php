@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
   {{trans('about_us.title.page')}}
@endsection

@section('main_content')

        <section class="  who-content-light light-bg  inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" style="color: red"><i class="glyphicon glyphicon-star-empty"></i> {{trans('about_us.title.section1')}} </h1>

                    <div class="col-md-8 section m-t-0">
                        <p>
                            {{trans('about_us.content1.section1')}}
                        </p>
                        <p>
                            {{trans('about_us.content2.section1')}}
                        </p>
                    </div><!-- /.section -->
                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/img2.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->

        </section><!-- /#what-can-we-do-for-you -->

        <section class="  around-world who-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg" ><i class="glyphicon glyphicon-globe"></i>   {{trans('about_us.title.section2')}} </h1>
                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/world.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>
                            {{trans('about_us.content.section2')}}
                        </p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section class="    light-bg  who-content-light inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" ><i class="glyphicon glyphicon-thumbs-up"></i>  {{trans('about_us.title.section3')}} </h1>
                    <div class="col-md-8 section m-t-0">
                        <p>
                            {{trans('about_us.content.section3')}}
                        </p>
                    </div><!-- /.section -->

                    <div class="col-md-4" style="width: 300px;">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/satisf.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section class="  who-content-bg provedors inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg"><i class="fa fa-truck"></i>  {{trans('about_us.title.section4')}} </h1>

                    <div class="col-md-4" style="width: 280px;">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/provedors.png')}}" alt="" class="profile-pic img-responsive">

                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>
                            {{trans('about_us.content.section4')}}
                        </p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->


@endsection
