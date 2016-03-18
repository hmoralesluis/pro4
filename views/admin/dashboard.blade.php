@extends('admin.master')



@section('content')
    <div class="row-fluid">
      <div class="span12">
          <div class="center"><img class="center" src="{{url('shop/assets/images/logo.png')}}"></div>
          <h1 class=" center light_rounded green"> BIENVENIDO A LA INTERFAZ DE ADMINISTRACION DE </h1>
          <h2 class=" center light_rounded green"> MATEU EXPORT </h2>
      </div>

      <div class="row-fluid center">
          <div class="span12 infobox-container">
              <div class="infobox infobox-green  ">
                  <div class="infobox-icon">
                      <i class="icon-comments"></i>
                  </div>

                  <div class="infobox-data">
                      <span class="infobox-data-number">{{count($messages)}}</span>
                      <div class="infobox-content">Mensajes de contactos</div>
                  </div>

              </div>

              <div class="infobox infobox-blue  ">
                  <div class="infobox-icon">
                      <i class="icon-folder-open"></i>
                  </div>

                  <div class="infobox-data">
                      <span class="infobox-data-number">{{count($categories)}}</span>
                      <div class="infobox-content">Categorias </div>
                  </div>


              </div>

              <div class="infobox infobox-pink  ">
                  <div class="infobox-icon">
                      <i class="icon-cogs"></i>
                  </div>

                  <div class="infobox-data">
                      <span class="infobox-data-number">{{$product_count}}</span>
                      <div class="infobox-content">Productos</div>
                  </div>

              </div>

              <div class="infobox infobox-red  ">
                  <div class="infobox-icon">
                      <i class="icon-flag"></i>
                  </div>

                  <div class="infobox-data">
                      <span class="infobox-data-number">{{$brands_count}}</span>
                      <div class="infobox-content">Marcas</div>
                  </div>
              </div>

              </br>
              </br>

              <div class="space-6"></div>


          </div>

          <div class="vspace"></div>


      </div><!--/row-->


      <div class="row-fluid center">
              <div class="span3">
                  <a class="btn btn-app btn-primary radius-5" href="{{url('admin/users')}}"><i class="icon-user"></i></a>
                  <h1> <a href="{{url('admin/users')}}"> Usuarios </a></h1>
                  <h4> Aqui podra conocer toda la informacion y gestionar todos los usuarios que administran el catalogo</h4>
              </div>

             <div class="span3">
                 <a class="btn btn-app btn-primary radius-5" href="{{url('admin/categories')}}"><i class="icon-folder-open"></i></a>
                 <h1> <a href="{{url('admin/categories')}}"> Categorias </a></h1>

                 <h4> Aqui podra gestionar todos los fabricantes de autoomatas que contiene su catalogo</h4>
             </div>
             <div class="span3">
                 <a class="btn btn-app btn-primary radius-5"  href="{{url('admin/products')}}"><i class="icon-cogs"></i></a>
                 <h1> <a href="{{url('admin/products')}}"> Productos </a></h1>

                 <h4>  Aqui podra gestionar todos las piexas de autoomatas que contiene su catalogo</h4>
             </div>
             <div class="span3">
                 <a class="btn btn-app btn-primary radius-5" href="{{url('admin/brands')}}"><i class=" icon-flag "></i></a>
                 <h1> <a href="{{url('admin/brands')}}"> Marcas  </a></h1>

                 <h4> Aqui podra visualizar o adicionar marcas al banner de su catalogo</h4>
             </div>
         </div>


        <div class="row-fluid">
            <div class=" span12">
                <div class="widget-box transparent" id="recent-box">
                    <div class="widget-header">
                        <h4 class="lighter smaller">
                            <i class="icon-rss orange"></i>
                            Contactos recientes
                        </h4>


                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="tab-content padding-8">
                                <div id="comment-tab" class="tab-pane active">
                                    <div class="comments">
                                        @foreach($messages as $msg)
                                            <div class="itemdiv commentdiv">
                                            <div class="user">
                                                <img alt="{{$msg->name}}" src="{{url('shop/assets/avatars/avatar2.png')}}" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a>{{$msg->name}}</a>
                                                </div>

                                                <div class="name">
                                                    <a>Asunto: {{$msg->subject}}</a>
                                                </div>

                                                <div class="time">
                                                    <i class="icon-time"></i>
                                                    <span class="orange">{{$msg->created_at}}</span>
                                                </div>

                                                <div class="text">
                                                    <i class="icon-quote-left"></i>
                                                     {{$msg->message}}
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <a href="#" class="btn btn-minier btn-info">
                                                    <i class="icon-only icon-pencil"></i>
                                                </a>

                                                <a href="#" class="btn btn-minier btn-danger">
                                                    <i class="icon-only icon-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="hr hr8"></div>

                                    <div class="center">
                                        <i class="icon-comments-alt icon-2x green"></i>

                                        &nbsp;
                                        <a href="{{url('admin/contacts  ')}}">
                                            Ver todos los contactos &nbsp;
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="hr hr-double hr8"></div>
                                </div>
                            </div>
                        </div><!--/widget-main-->
                    </div><!--/widget-body-->
                </div><!--/widget-box-->
            </div><!--/span-->
        </div><!--/row-->





  </div>
@endsection