<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li @if (Route::is('admin.adherents.*')) class="active" @endif><a href="{{ route('admin.adherents.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Adherents</span>
                </a>
            </li>

           <li @if (Route::is('admin.orders.*')) class="active" @endif><a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Commandes</span>
                </a>
            </li>


            <li @if (Route::is('admin.books.*')) class="active" @endif><a href="{{ route('admin.books.index') }}">
                    <i class="fa fa-book"></i>
                    <span>Livres</span>
                </a>
            </li>
        </ul>
    </section>
</aside>