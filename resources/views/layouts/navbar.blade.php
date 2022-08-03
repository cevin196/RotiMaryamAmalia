<nav class="header__menu mobile-menu">
    <ul>
        <li class="{{(Route::currentRouteName()=='dashboard')?'active':''}}"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('about')}}">Tentang Kami</a></li>
        <li 
        @if (Route::currentRouteName()=='shop'||Route::currentRouteName()=='user.order'||Route::currentRouteName()=='cart')
            class="active"
        @endif
        ><a href="#">Belanja</a>
            <ul class="dropdown">
                <li><a href="{{route('shop')}}">Belanja</a></li>
                <li><a href="{{route('cart')}}">Keranjang</a></li>
                <li><a href="{{route('order-list')}}">List Pesanan</a></li>
            </ul>
        </li>
        {{-- <li><a href="./blog.html">Blog</a></li> --}}
        <li><a href="{{route('kontak-kami')}}">Kontak Kami</a></li>
    </ul>
</nav>