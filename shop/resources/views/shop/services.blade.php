@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Que ofrecemos
@endsection

@section('main_content')
    <main id="about-us">
        <div class="container inner-top-xs inner-bottom-sm">
            <div class="row">
                <div class="col-xs-12 col-md68 col-lg68 col-sm68">
                    <section id="who-we-are" class="section m-t-0">
                        <h2>Quienes somos</h2>
                        <ul>
                            <li>
                                <p>
                                    Servicio de suministro de piezas, m�dulos ,
                                    tarjetas y otros, tanto nuevas, reparadas como de uso ,
                                    para la automatizaci�n industrial, sistemas de PLC (Aut�matas ).
                                </p>
                            </li>

                            <li>
                                <p>
                                    Disponemos de una gama amplia de piezas de repuesto de sistemas
                                    de control o aut�matas que ya est�n descatalogados por los fabricantes.
                                </p>
                            </li>

                            <li>
                                <p>
                                    Contamos con la colaboraci�n de socios extranjeros para la
                                    localizaci�n de piezas de dif�cil acceso.
                                </p>
                            </li>

                            <li>
                                <p>
                                    Poseemos una base de datos organizada tanto por marcas como por c�digos
                                    de productos para una r�pida localizaci�n de la pieza.
                                </p>
                            </li>


                            <li>
                                <p>
                                    Nuestro stock crece continuamente a medida que
                                    incorporamos nuevas l�neas o marcas a nuestra empresa.
                                </p>
                            </li>


                        </ul>
                    </section><!-- /#who-we-are -->
                </div><!-- /.col -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </main><!-- /#about-us -->
@endsection