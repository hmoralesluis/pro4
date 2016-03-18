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
                        <h2>Que ofrecemos</h2>
                        <ul>
                            <li>
                                <p>
                                    Servicio de suministro de piezas, módulos ,
                                    tarjetas y otros, tanto nuevas, reparadas como de uso ,
                                    para la automatización industrial, sistemas de PLC (Autómatas ).
                                </p>
                            </li>

                            <li>
                                <p>
                                    Disponemos de una gama amplia de piezas de repuesto de sistemas
                                    de control o autómatas que ya están descatalogados por los fabricantes.
                                </p>
                            </li>

                            <li>
                                <p>
                                    Contamos con la colaboración de socios extranjeros para la
                                    localización de piezas de difícil acceso.
                                </p>
                            </li>

                            <li>
                                <p>
                                    Poseemos una base de datos organizada tanto por marcas como por códigos
                                    de productos para una rápida localización de la pieza.
                                </p>
                            </li>


                            <li>
                                <p>
                                    Nuestro stock crece continuamente a medida que
                                    incorporamos nuevas líneas o marcas a nuestra empresa.
                                </p>
                            </li>
                        </ul>
                    </section><!-- /#who-we-are -->
                </div><!-- /.col -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </main><!-- /#about-us -->
@endsection