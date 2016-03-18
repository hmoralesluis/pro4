@extends('admin.master')

@section('page_title')
    <h3 class="header smaller lighter blue">Marca patrosinadora</h3>
@endsection
@section('content')

        <div class="table-header">
           Todas las marcas patrocinadoras
              <a class="btn btn-success" href="{{url('admin/brand/create')}}"> Nueva   </a>
        </div>


            @foreach($brands as $brand)
                <div class="brands-item span3 center">
                        <div class="hidden-phone visible-desktop btn-group">
                            <div>
                                <img class="img-responsive" src="{{url('catalog/images/brands/'. $brand->image)}}" alt=" " />
                            </div>

                            <a class="btn btn-mini btn-danger" href="{{url('admin/brand/delete/'.$brand->id)}}">
                                <i class="icon-trash bigger-120"></i>
                            </a>
                        </div>
                </div>
            @endforeach
        <div class="span12 center pagination">
           {!! $brands->render() !!}
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