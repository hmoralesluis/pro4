
    <!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown">
        <div class="head"><i class="fa fa-list"></i> Fabricantes </div>
        <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
                @foreach($categories as $cat)
                        <li><a href="{{url('/category/'.$cat->id)}}">{{$cat->name}}</a></li>
                @endforeach
            </ul><!-- /.nav -->
        </nav><!-- /.megamenu-horizontal -->
    </div><!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->
