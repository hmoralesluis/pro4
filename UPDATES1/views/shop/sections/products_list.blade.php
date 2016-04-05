<section id="gaming"  class=" wow fadeInUp">
    <div class="container">
            <h2 class="section-title">Productos fabricante:  {{$category->name}}</h2>
        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane in active">
                <div class="product-grid-holder">
                    <div class="row no-margin">
                        <table class="table table-striped">
                            <thead>
                            <th> No</th>
                            <th> {{trans('index.table.mark')}}</th>
                            <th> {{trans('index.table.part_number')}}</th>
                            <th> {{trans('index.table.code')}}</th>
                            <th> {{trans('index.table.description')}}</th>
                            </thead>

                            @for($i = 0; $i < count($products); $i++)
                                <tr>
                                 <td> <a href="{{url('product/details/'. $products[$i]->id)}}" >{{$i + 1}} </a></td>
                                 @if(!is_null($category))
                                    <td> {{$products[$i]->mark}} </td>
                                 @endif
                                 <td> <a href="{{url('product/details/'. $products[$i]->id)}}"> {{$products[$i]->part_number}} </a></td>
                                 <td> {{$products[$i]->code}} </td>
                                 <td> {{$products[$i]->description}} </td>
                               </tr>
                            @endfor

                            <tfoot>
                            <th> No</th>
                            <th> {{trans('index.table.mark')}}</th>
                            <th> {{trans('index.table.part_number')}}</th>
                            <th> {{trans('index.table.code')}}</th>
                            <th> {{trans('index.table.description')}}</th>
                            </tfoot>
                        </table>
                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->
                <div class="pagination-holder">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12">
                            <ul>
                                {!! $products->render() !!}
                            </ul>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->
            </div><!-- /.products-grid #grid-view -->



        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->