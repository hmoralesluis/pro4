@extends('admin.master')

@section('page_title')
    <h3 class="header smaller lighter blue">Productos</h3>

@endsection


@section('content')
    <div class="row-fluid">
        <div class="span12">

            <div class="table-header">
                Todos los productos
                <a class="btn btn-success" href="{{url('admin/product/create')}}"> Nuevo   </a>
            </div>


            <div class="search_product pull-right">
                <form action="{{url('admin/product/search')}}" method="get" class="form-search">
                    <span class="input-icon">
                        <input name="search" type="text" placeholder="Busar producto" class="input-small search-query" id="nav-search-input"   />

                        <input align="center" class="  btn btn-small " type="submit" value="Buscar"/>
				   </span>
                </form>
            </div><!--#nav-search-->
        </div>



        <table class="table table-striped table-bordered table-hover">




            <thead>
            <tr>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Numero de parte</th>
                <th>Codigo</th>
                <th>Categoria</th>
                <th class="hidden-480">Descripcion</th>
                <th>Visitas</th>
                <th>Acciones</th>
            </tr>
            </thead>


            <tbody>

            @foreach($products as $prod)
                <tr>

                    <td class="center">
                        <img class="img_product nav-user-photo " src="{{url('catalog/images/' . $prod->image)}}" alt="" />
                    </td>

                    <td>
                        {{$prod->mark}}
                    </td>

                    <td>
                        {{$prod->part_number}}
                    </td>


                    <td>
                        {{$prod->code}}
                    </td>


                    <td>
                        {{$prod->categories}}
                    </td>

                    <td>
                        {{$prod->description}}
                    </td>

                    <td>
                        {{$prod->visit_count}}
                    </td>
                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop btn-group">

                            <a class="btn btn-mini btn-info"  href="{{url('admin/product/edit/'.$prod->id)}}">
                                <i class="icon-edit bigger-120"></i>
                            </a>

                            <a class="btn btn-mini btn-danger" href="{{url('admin/product/delete/'.$prod->id)}}">
                                <i class="icon-trash bigger-120"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach




            </tbody>
        </table>

        <div class="pagination">
            {!! $products->render() !!}
        </div>
    </div>




@endsection

@section('scripts')
    {!! HTML::script('admin/assets/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('admin/assets/js/jquery.dataTables.bootstrap.js') !!}



    <script type="text/javascript">
        $(function() {
            var oTable1 = $('#table_report').dataTable( {
                "aoColumns": [
                    { "bSortable": false },
                    { "bSortable": false },
                     null,null,null,null,null,null,
                    { "bSortable": false }
                ] } );


            $('table th input:checkbox').on('click' , function(){
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });

            });

            $('[data-rel=tooltip]').tooltip();
        })
    </script>
@endsection