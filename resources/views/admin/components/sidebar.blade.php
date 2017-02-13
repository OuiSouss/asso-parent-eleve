<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

    <!-- Sidebar user panel (optional)
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        -->

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if (Route::is('adherents.index')) class="active" @endif><a href="{{ route('adherents.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Adherents</span>
                </a>
            </li>

            <li @if (Route::is('admin.orders')) class="active" @endif><a href="{{ route('admin.orders') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Commandes</span>
                </a>
            </li>

            <li @if (Route::is('admin.books')) class="active" @endif><a href="{{ route('admin.books') }}">
                    <i class="fa fa-book"></i>
                    <span>Livres</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>