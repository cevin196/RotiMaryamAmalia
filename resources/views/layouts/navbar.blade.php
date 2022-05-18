<nav class="header__menu mobile-menu">
    <ul>
        <li class="{{(Route::currentRouteName()=='dashboard')?'active':''}}"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('tentang-kami')}}">Tentang Kami</a></li>
        <li 
        @if (Route::currentRouteName()=='belanja'||Route::currentRouteName()=='user.pesanan'||Route::currentRouteName()=='keranjang')
            class="active"
        @endif
        ><a href="#">Belanja</a>
            <ul class="dropdown">
                <li><a href="{{route('belanja')}}">Belanja</a></li>
                <li><a href="{{route('keranjang')}}">Keranjang</a></li>
                <li><a href="{{route('list-pesanan')}}">List Pesanan</a></li>
            </ul>
        </li>
        {{-- <li><a href="./blog.html">Blog</a></li> --}}
        <li><a href="./contact.html">Kontak Kami</a></li>
    </ul>
</nav>