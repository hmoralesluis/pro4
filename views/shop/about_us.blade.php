@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Quienes somos
@endsection

@section('main_content')
    <main id="about-us">
        <section class="row who-content-light light-bg  inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" ><i class="glyphicon glyphicon-star-empty"></i> SOMOS MATEU EXPORT S.L. </h1>

                    <div class="col-md-8 section m-t-0">


                        <p>
                            Un grupo de empresas familiares españolas,
                            con una larga tradición a través de varias generaciones,
                            con más de 60 años de experiencia en el mercado internacional
                            e insertada en la cadena de suministro industrial,
                            diseñada para mitigar las presiones de la fabricación moderna.
                        </p>

                        <p>
                            Mateu Export, situados en el centro de Catalunya,
                            una de las regiones más avanzadas de Europa
                            y uno de los cuatro motores principales de la UE.
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

        <section class="row around-world who-content-bg inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg" ><i class="glyphicon glyphicon-globe"></i> ALCANCE </h1>
                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/world.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">
                        <p>
                            Nuestras empresas están presentes en 70 paises de los 5 continentes,
                            a través de nuestros 73 representantes y/o distribuidores en cada uno de ellos.
                            Trabajamos lo mas cerca posible de nuestros clientes para conocer sus problemas y necesidades lo antes posible.
                        </p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section class="row   light-bg  who-content-light inner-xs">
            <div class="container">
                <div class="row">

                    <h1 class="who-title-light" ><i class="glyphicon glyphicon-thumbs-up"></i> SATISFACCION </h1>
                    <div class="col-md-8 section m-t-0">


                        <p>


                            Nuestras empresas, modestas, con poca burocracia y sin lujos,
                            no tienen que incidir estos gastos sobre los articulos a vender.
                            Nos interesa tener clientes asiduos y que crezca nuestra familia de clientes.
                            Aqui cada cliente no es numero, es alguien muy querido,
                            al cual nos complace tenerlo siempre satisfecho en calidad,
                            precio y servicio.
                        </p>
                    </div><!-- /.section -->

                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/satisf.jpg')}}" alt="" class="profile-pic img-responsive">


                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

        <section class="row who-content-bg provedors inner-xs">
            <div class="container">
                <div class="row">
                    <h1 class="who-title-bg"><i class="fa fa-truck"></i> PROVEEDORES </h1>

                    <div class="col-md-4">
                        <ul class="team-members list-unstyled">

                            <li class="team-member">
                                <img src="{{url('shop/assets/images/who/provedors.png')}}" alt="" class="profile-pic img-responsive">

                            </li><!-- /.team-member -->
                        </ul><!-- /.team-members -->


                    </div>
                    <div class="col-md-8 section m-t-0">


                        <p>
                            No estamos afiliados a ningún fabricante por una buena razón.
                            Para que podamos ofrecer a nuestros clientes la opción más rápida,
                            más flexible y más económica.
                        </p>
                    </div><!-- /.section -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#what-can-we-do-for-you -->

    </main><!-- /#about-us -->
@endsection