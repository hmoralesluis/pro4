@extends('admin.master')

@section('page_title')
    <h3 class="header smaller lighter blue">Categorias</h3>
@endsection



@section('content')
    <div class="row-fluid">

        <div class="table-header">
            Todas las categorias
              <a class="btn btn-success" href="{{url('admin/category/create')}}"> Nueva   </a>
        </div>

        <table id="table_report" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    <label>
                        <input type="checkbox" />
                        <span class="lbl"></span>
                    </label>
                </th>
                <th>Nombre</th>
                <th class="hidden-480">Cantidad de productos</th>
                <th>Acciones</th>
            </tr>
            </thead>


            <tbody>

            @foreach($categories as $cat)
                <tr>

                    <td class="center">
                        <label>
                            <input type="checkbox" />
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td>
                        {{$cat->name}}
                    </td>

                    <td>
                        {{$cat->count_products}}
                    </td>

                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop btn-group">


                            <a class="btn btn-mini btn-info0"  href="{{url('admin/category/edit/'.$cat->id)}}">
                                <i class="icon-edit bigger-120"></i>
                            </a>

                            <a class="btn btn-mini btn-danger" href="{{url('admin/category/delete/'.$cat->id)}}">
                                <i class="icon-trash bigger-120"></i>
                            </a>
                        </div>
                    </td>



                </tr>
            @endforeach





            </tbody>
        </table>
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
                     null,null,
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