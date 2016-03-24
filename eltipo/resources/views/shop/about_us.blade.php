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
                        <h2>SOMOS MATEU EXPORT S.L.</h2>
                        <p>
                            Un grupo de empresas  familiares  españolas,  con una larga tradición a través de varias generaciones, con más de 60 años de experiencia en el mercado internacional e insertada en la cadena de suministro industrial, diseñada para mitigar las presiones de la fabricación moderna.
                        </p>

                        <p>
                            Mateu Export, situados en el centro de Catalunya, una de las regiones más avanzadas de Europa y uno de los cuatro motores principales de la UE.
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
            <hr>

            <div class="containertri">
                <div class="row section m-t-0" style="background-color: #dddccf;">
                    <div style="float: left; margin: 0 0 1em 1em;">
                        <h4 style="margin-top: 5px;">ALCANCE</h4>
                        <img src="{{url('catalog/images/extra/alcance1.jpg')}}" style="margin-right: 20px;" class="img-thumbnail">
                    </div>
                    <div style="margin: 30px;">
                        <p>
                            Nuestras empresas están presentes en 70 paises de los 5 continentes, a través de nuestros 73 representantes y/o distribuidores en cada uno de ellos.
                            Trabajamos lo mas cerca posible de nuestros clientes para conocer sus problemas y necesidades lo antes posible.
                        </p>
                        <hr>

                    </div>
                    <div style="float: left; margin: 0 0 1em 1em;">
                        <h4 >SATISFACCION</h4>
                        <img src="{{url('catalog/images/extra/satisfaccion1.jpg')}}" style="margin-right: 20px;" class="img-thumbnail">
                    </div>
                    <div style="margin: 50px;">
                        <p>
                            Nuestras empresas, modestas, con poca burocracia y sin lujos, no tienen que incidir estos gastos sobre los articulos a vender. Nos interesa tener clientes asiduos y que crezca nuestra familia de clientes. Aqui cada cliente no es numero, es alguien muy querido, al cual nos complace tenerlo siempre satisfecho en calidad, precio y servicio.
                        </p>
                        <hr>

                    </div>
                    <div style="float: left; margin: 0 0 1em 1em;">
                        <h4>PROVEEDORES</h4>
                        <img src="{{url('catalog/images/extra/proveedores1.jpg')}}" style="margin-right: 20px;" class="img-thumbnail">
                    </div>
                    <div style="margin: 70px;">
                        <p>
                            No estamos afiliados a ningún fabricante por una buena razón. Para que podamos ofrecer a nuestros clientes la opción más rápida, más flexible y más económica.
                        </p>
                        <hr>

                    </div>
                    <div style="position: absolute; top: 450px; left: -3%">

                        <img src="{{url('catalog/images/extra/logo3.png')}}" style="width: 390px;" class="img-polaroid">
                    </div>

                </div>
            </div>
        </div><!-- /.container -->




    </main><!-- /#about-us -->
@endsection
