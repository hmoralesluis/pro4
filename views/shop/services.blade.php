@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Que ofrecemos
@endsection

@section('main_content')
    <main id="about-us">
        <section id="what-can-we-do-for-you" class="row  light-bg inner-sm">

            <div class="container">
                <div class="row">
                    <div id="main-service" class="col-md-3 section service-summary m-t-0">
                        <h2>MATEU EXPORT S.L.</h2>
                        <p> Con más de 60 años de experiencia dentro de la cadena de suministro industrial,
                            especialmente en el mundo de las piezas de repuesto.</p>

                            <p>Con nuestra línea de piezas y módulos de repuestos para sistemas de control,
                            automatas o PLC. <h4>QUEREMOS OFRECERLE:</h4>
                        </p>
                    </div><!-- /.section -->

                    <div class="col-md-9">
                        <ul id="serv_content" class="services list-unstyled row m-t-35">
                            <li class="col-md-4">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-fax"></i></div>
                                    <h3>Repuestos para la automatizacón</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section1">Detalles</a></div>
                                </div>
                            </li>
                            <li class="col-md-4 ">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-cogs"></i></div>
                                    <h3>Comprendemos las presiones de la industria moderna</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section2">Detalles</a></div>
                                </div>
                            </li>
                            <li class="col-md-4">
                                <div class="service">
                                    <div class="service-icon primary-bg"><i class="fa fa-thumbs-o-up"></i></div>
                                    <h3>Atención personalizada a cada uno de nuestros clientes</h3>
                                    <div class=" details "><i class=""></i><a class="btn primary-bg " href="#section3">Detalles</a></div>
                                </div>

                            </li>
                        </ul><!-- /.services -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->

        </section><!-- /#what-can-we-do-for-you -->

        <section id="section1" class="row  services-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg" > REPUESTOS PARA LA AUTOMATIZACION </h1>
                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/new_pieces.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->

                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>Productos competitivos en todas nuestras áreas  tanto en calidad, precio y servicio. Productos de última generación y stock de productos descatalogados por las grandes compañías, que podemos suministrarle para que no tenga que cambiar sus equipos, si  no lo desean.</p>
                        <p>Miles de productos de más de 100 fabricantes, que se encuentran detallados y organizados en nuestra base de datos. Nuestro stock crece continuamente a medida que incorporamos nuevas líneas y fabricantes a nuestro catálogo.</p>
                        <p>Contamos con una amplia red de colaboración de socios extranjeros para agilizar la localización y adquisición de partes y piezas de difícil acceso.</p>
                        <p> Todas nuestras piezas, módulos o tarjetas tienen una garantía de 12 meses.</p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section id="section2" class="row  services-content-light light-bg    inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" >  COMPRENDEMOS LAS PRESIONES DE LA INDUSTRIA MODERNA </h1>
                    <div class="col-md-8 section m-t-0">
                        <p>Nuestra empresa comprende y está alineada con los objetivos de las industrias de sectores tan diferentes como Energético, Textil, Químico y otros en todo el mundo y ofrece un suministro de repuestos para los sistemas de control que permitan  a los profesionales de la fabricación moderna, trabajar más rápido y de forma más eficiente e inteligente.</p>
                        <p>Nuestros servicios están diseñados específicamente para proporcionar el suministro  de partes y piezas, para sistemas de automatización, tanto nuevas, restauradas  o descatalogadas de  acuerdo con las características fundamentales de velocidad, alcance o costo de la inversión. </p>
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

        <section id="section3" class="row services-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg">  ATENCION PERSONALIZADA A CADA UNO DE NUESTROS CLIENTES </h1>

                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/clients.jpg')}}" alt="" class="profile-pic img-responsive">

                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>Nuestro éxito, en gran parte, se ha basado en la atención y apoyo que brindamos a nuestros clientes en todo el mundo, con un trato personal y directo, con el principal objetivo de asegurar  su satisfacción.</p>
                        <p>Nuestro equipo de trabajo está preparado para asesorarle, localizarle y enviarle su pedido en el menor tiempo posible, acorde a las necesidades que hoy exige la industria moderna.</p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

    </main><!-- /#about-us -->
@endsection



