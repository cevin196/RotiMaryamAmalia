<nav class="header__menu mobile-menu">
    <ul>
        <li class="{{(Route::currentRouteName()=='dashboard')?'active':''}}"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('tentang-kami')}}">Tentang Kami</a></li>
        <li class="{{(Route::currentRouteName()=='belanja')?'active':''}}"><a href="{{route('belanja')}}">Belanja</a></li>
        {{-- <li><a href="#">Pages</a>
            <ul class="dropdown">
                <li><a href="./shop-details.html">Shop Details</a></li>
                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                <li><a href="./checkout.html">Check Out</a></li>
                <li><a href="./wisslist.html">Wisslist</a></li>
                <li><a href="./Class.html">Class</a></li>
                <li><a href="./blog-details.html">Blog Details</a></li>
            </ul>
        </li> --}}
        {{-- <li><a href="./blog.html">Blog</a></li> --}}
        <li><a href="./contact.html">Kontak Kami</a></li>
    </ul>
</nav>