@extends('admin.app')
@section('body')
    <body class="login-layout">
    <div class="container-fluid" id="main-container">
        <div id="main-content">
            <div class="row-fluid">
                <div class="span12">
                    <div class="login-container">
                        <div class="row-fluid">
                            <div class="center">
                                <h1>
                                    <i class="icon-leaf green"></i>
                                    <span class="red">Entrar a la administracion</span>
                                </h1>
                                <h4 class="blue">&copy; Mateu Export</h4>
                            </div>
                        </div>

                        <div class="space-6"></div>

                        <div class="row-fluid">
                            <div class="position-relative">
                                <div id="login-box" class="visible widget-box no-border">
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


                                            <h4 class="header blue lighter bigger">
                                                <i class="icon-coffee green"></i>
                                                Por favor entre su informacion
                                            </h4>

                                            <div class="space-6"></div>

                                            <form method="post" action="{{url('/admin/dologin')}}" role="form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <fieldset>
                                                    <label>
															<span class="block input-icon input-icon-right">
																<input type="email" name="email" class="span12" placeholder="Correo" />
																<i class="icon-user"></i>
															</span>
                                                    </label>

                                                    <label>
															<span class="block input-icon input-icon-right">
																<input name="password" type="password" class="span12" placeholder="Contrasena" />
																<i class="icon-lock"></i>
															</span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="row-fluid">

                                                        <button type="submit" class="span4 btn btn-small btn-primary">
                                                            <i class="icon-key"></i>
                                                            Entrar
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div><!--/widget-main-->
                                    </div><!--/widget-body-->
                                </div><!--/login-box-->
                            </div><!--/position-relative-->
                        </div>
                    </div>
                </div><!--/span-->
            </div><!--/row-->
        </div>
    </div><!--/.fluid-container-->

    <!--basic scripts-->

    {!! HTML::script('admin/assets/js/jquery-1.9.1.min.js') !!}
    {!! HTML::script('admin/assets/js/bootstrap.min.js') !!}

    <!--page specific plugin scripts-->

    <!--inline scripts related to this page-->

    <script type="text/javascript">
        function show_box(id) {
            $('.widget-box.visible').removeClass('visible');
            $('#'+id).addClass('visible');
        }
    </script>
    </body>
@endsection