@extends('admin.master')
@section('styles')
    {!! HTML::style('admin/assets/css/jquery-ui-1.10.3.custom.min.css') !!}
    {!! HTML::style('admin/assets/css/chosen.css') !!}
@endsection

@section('page_title')
    <h3 class="header smaller lighter blue">Agregar nueva marca patrocinadora</h3>
@endsection

@section('content')
            <form method="post" class="form-horizontal" action="{{url('admin/brand/store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="control-group">

                    <div class="controls">
                        <label for="id-input-file-1">Imagen</label>
                        <input name="image" type="file" id="id-input-file-1" required="true"/>
                    </div>
                </div>
                <div class="form-actions">
                    <button  class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        Agregar
                    </button>



                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Resetear
                    </button>
                </div>
            </form>

@endsection

@section('scripts')
    {!! HTML::script('admin/assets/js/jquery-ui-1.10.3.custom.min.js') !!}
    {!! HTML::script('admin/assets/js/jquery.ui.touch-punch.min.js') !!}
    {!! HTML::script('admin/assets/js/chosen.jquery.min.js') !!}

    <script  type="text/javascript">
        $(function() {
            $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                no_file:'No File ...',
                btn_choose:'Choose',
                btn_change:'Change',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'icon-cloud-upload',
                droppable: true,
                thumbnail: 'small',
                before_change: function (files, dropped) {
                    /**
                     if(files instanceof Array || (!!window.FileList && files instanceof FileList)) {
							//check each file and see if it is valid, if not return false or make a new array, add the valid files to it and return the array
							//note: if files have not been dropped, this does not change the internal value of the file input element, as it is set by the browser, and further file uploading and handling should be done via ajax, etc, otherwise all selected files will be sent to server
							//example:
							var result = []
							for(var i = 0; i < files.length; i++) {
								var file = files[i];
								if((/^image\//i).test(file.type) && file.size < 102400)
									result.push(file);
							}
							return result;
						}
                     */
                    return true;
                }
                /*,
                 before_remove : function() {
                 return true;
                 }*/

            }).on('change', function () {
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });
        });

    </script>
    @endsection
