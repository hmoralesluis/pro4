@extends('shop.sections.master')


@section('top_header')
    @include('shop.sections.top')
@endsection

@section('title')
    Que ofrecemos
@endsection

@section('main_content')
    <main id="contact-us" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <section class="section leave-a-message">




                        <h2 class="bordered">Deje su mensaje</h2>
                        <p>Contacte con nosotros</p>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas para enviarnos su mensaje<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{url('contact_submit')}}" method="post" id="contact-form" class="contact-form cf-style-1 inner-top-xs">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-6">
                                    <label> Nombre*</label>
                                    <input required="true" name="name" type="text" class="le-input" >
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label>Correo*</label>
                                    <input required="true" name="email" type="email" class="le-input" >
                                </div>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>Asunto</label>
                                <input name="subject" type="text" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>Su mensaje</label>
                                <textarea required="true" name="message" rows="8" class="le-input">

                                </textarea>
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">Enviar mensaje</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.contact-form -->
                    </section><!-- /.leave-a-message -->
                </div><!-- /.col -->

                <div class="col-md-4">
                    <section class="our-store section inner-left-xs">
                        <h2 class="bordered">Nuestra tienda</h2>
                        <address>
                            Avda. Bases de Manresa,<br/>
                            27-29 bajos 08242 Manresa<br/>
                            (Barcelona) España. <br/>
                        </address>
                        <h3>Telefonos</h3>
                        <ul class="list-unstyled operation-hours">
                            <li class="clearfix">
                                <span class="day">Tel: </span>
                                <span class="pull-right hours">+34938771199 </span>
                            </li>
                            <li class="clearfix">
                                <span class="day">Fax:</span>
                                <span class="pull-right hours">+34938771714</span>
                            </li>
                        </ul>
                        <h3>Correo electronico</h3>
                        <ul class="list-unstyled operation-hours">
                            <li class="clearfix">

                                <span class=" hours">mateu-export@cambrescat.es</span>
                            </li>
                            <li class="clearfix">

                                <span class=" hours">info@novateksilar.com</span>
                            </li>
                        </ul>
                    </section><!-- /.our-store -->
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
@endsection