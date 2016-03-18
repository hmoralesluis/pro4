@extends('admin.app')

@section('body')
    <body>
    <div class="navbar navbar-inverse ">
        <div class="navbar-inner ">
            <div class="container-fluid">
                <a href="{{url('admin/dashboard')}}" class="brand">
                    <small>
                        <i class="icon-leaf"></i>
                        Admin catalogo
                    </small>
                </a><!--/.brand-->

                <a href="{{url('/')}}" class="brand">
                    <small>
                        <i class="icon-home"></i>
                          Visitar catalogo
                    </small>
                </a><!--/.brand-->

                <ul class="nav ace-nav pull-right">
                    <li class="light-blue user-profile">
                        <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<span id="user_info">
									<small>Bienvenido,</small>
									{{$user->name}}
								</span>

                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
                            <li>
                                <a href="{{url('admin/user/edit/'. $user->id)}}">
                                    <i class="icon-user"></i>
                                    Perfil
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{url('admin/logout')}}">
                                    <i class="icon-off"></i>
                                    Cerrar sesion
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul><!--/.ace-nav-->
            </div><!--/.container-fluid-->
        </div><!--/.navbar-inner-->
    </div>

    <div class="container-fluid" id="main-container">
        <a id="menu-toggler" href="{{url('/admin/dashboard')}}">
            <span></span>
        </a>



        <div id="sidebar">

            <ul class="nav nav-list">
                <li>
                    <a href="{{url('/admin/dashboard')}}">
                        <i class="icon-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/users')}}">
                        <i class="icon-user"></i>
                        <span>Usuarios</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/categories')}}">
                        <i class="icon-folder-open "></i>
                        <span>Categorias</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/products')}}">
                        <i class=" icon-cogs"></i>
                        <span>Productos</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/brands')}}">
                        <i class="icon-flag"></i>
                        <span>Marcas del banner</span>
                    </a>
                </li>


                <li>
                    <a href="{{url('admin/contacts')}}">
                        <i class="icon-comments "></i>
                        <span>Contactos</span>
                    </a>
                </li>


            </ul><!--/.nav-list-->

            <div id="sidebar-collapse">
                <i class="icon-double-angle-left"></i>
            </div>
        </div>

        <div id="main-content" class="clearfix">
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                         @yield('page_title')
                    </li>
                </ul><!--.breadcrumb-->
            </div>

            <div id="page-content" class="clearfix">
                <div class="row-fluid">
                    <!--PAGE CONTENT BEGINS HERE-->
                    @yield('content')
                            <!--PAGE CONTENT ENDS HERE-->
                </div><!--/row-->
            </div><!--/#page-content-->


        </div><!--/#main-content-->
    </div><!--/.fluid-container#main-container-->

    <a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>

    <!--basic scripts-->

    {!! HTML::script('admin/assets/js/jquery-1.9.1.min.js') !!}
    {!! HTML::script('admin/assets/js/bootstrap.min.js') !!}


            <!--page specific plugin scripts-->

    <!--ace scripts-->

    {!! HTML::script('admin/assets/js/ace-elements.min.js') !!}
    {!! HTML::script('admin/assets/js/ace.min.js') !!}

    @yield('scripts')
            <!--inline scripts related to this page-->
    </body>

    @endsection