@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Quienes somos
@endsection

@section('main_content')
    <main id="about-us">
        <div class="container inner-top-xs inner-bottom-sm">

            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8 col-sm-8">

                    <section id="who-we-are" class="section m-t-0">
                        <h2>Quienes somos</h2>
                        <p>
                            Mateu Export, situados en el centro de Catalunya,
                            una de la regiones mas avanzadas de Europa y
                            uno de los cuatro motores principales de la UE.
                        </p>

                        <p>
                            Nuestras empresas están hoy en día presentes en 66 mercados internacionales de los 5 continentes,
                            a través de nuestros representantes y/o distribuidores en cada uno de ellos.
                        </p>

                        <p>
                            Una de las principales líneas de nuestra empresa es el suministro de repuestos, módulos,
                            tarjetas y piezas para sistemas de control o para la automatización industrial prácticamente
                            para cualquier marca o modelo.
                        </p>

                    </section><!-- /#who-we-are -->


                </div><!-- /.col -->
                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">

                    <section id="our-team">
                        <h2 class="sr-only">Our team</h2>
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="assets/images/team/1.jpg" alt="" class="profile-pic img-responsive">
                                <div class="profile">
                                    <h3>John Snow <small class="designation">CEO/Founder</small></h3>
                                    <ul class="social list-unstyled">
                                        <li>
                                            <a href="http://facebook.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://twitter.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://linkedin.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.profile -->
                            </li><!-- /.team-member -->

                            <li class="team-member">
                                <img src="assets/images/team/2.jpg" alt="" class="profile-pic img-responsive">
                                <div class="profile">
                                    <h3>Smith John <small class="designation">Support Staff</small></h3>
                                    <ul class="social list-unstyled">
                                        <li>
                                            <a href="http://facebook.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://twitter.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://linkedin.com/">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.profile -->
                            </li><!-- /.team-member -->

                        </ul><!-- /.team-members -->
                    </section><!-- #our-team -->

                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container -->




    </main><!-- /#about-us -->
@endsection