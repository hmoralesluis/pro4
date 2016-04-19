@extends('admin.master')

@section('page_title')
    <h3 class="header smaller lighter blue">Mensajes contactos</h3>
@endsection



@section('content')
    <div class="row-fluid">

        <div class="table-header">
            Todos los mensajes de contactos

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
                <th class="hidden-480">Correo</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
            </thead>


            <tbody>

            @foreach($contacts as $contact)
                <tr>

                    <td class="center">
                        <label>
                            <input type="checkbox" />
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td>
                        {{$contact->name}}
                    </td>

                    <td>
                        {{$contact->email}}
                    </td>

                    <td>
                        {{$contact->subject}}
                    </td>

                    <td>
                        {{$contact->message}}
                    </td>

                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop btn-group">

                            <a class="btn btn-mini btn-danger" href="{{url('admin/contact/delete/'.$contact->id)}}">
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
                    null,null,null,
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