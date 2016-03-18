@extends('admin.master')

@section('page_title')
    <h3 class="header smaller lighter blue"><i class="icon-group blue"></i>
        Registrar nuevo usuario administrador</h3>
@endsection


@section('content')
    <div id="signup-box" class="widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Hay problemas con sus datos para entrar al sistema<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif





                <div class="space-6"></div>
                <p>
                    Entrar sus datos
                </p>

                <form method="post" action="{{url('admin/user/store')}}">
                    <fieldset >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label>
                            <span class=" span7 block input-icon">
                                <input name="name" type="text" class="" placeholder="Nombre" />
                                <i class="icon-user"></i>
                            </span>
                        </label>

                        <label>
                            <span class="  span7 block input-icon">
                                <input name="email" type="email" class=" " placeholder="Correo electronico" />
                                <i class="icon-envelope"></i>
                            </span>
                        </label>
                        </br>
                        </br>
                        <label>
                            <span class=" span8 block input-icon">
                                <input name="password" type="password" class=" " placeholder="Contrasena" />
                                <i class="icon-lock"></i>
                            </span>
                        </label>
                        </br>
                        </br>

                        <label>
                            <span class=" span8 block input-icon">
                                <input type="password" class=" " placeholder="Repetir contrasena" name="password_confirmation"/>
                                <i class="icon-retweet"></i>
                            </span>
                        </label>



                        <div class="space-24"></div>
                        <div class="space-24"></div>



                        <div class="span12 row-fluid">
                            <button type="reset" class="span2 btn btn-small">
                                <i class="icon-refresh"></i>
                                Resetear
                            </button>

                            <button type="submit" class="span2 btn btn-small btn-success">
                                Registrar
                                <i class="icon-arrow-right icon-on-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div><!--/widget-body-->
    </div><!--/signup-box-->
@endsection
