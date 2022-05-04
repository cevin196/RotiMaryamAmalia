<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header__top__inner">
                        <div class="header__top__left">
                            @if(Auth::check())
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                class="btn btn-outline-warning">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                            <a href="{{route('login')}}" class="btn btn-outline-warning">Sign in</a>
                            @endif
                        </div>
                        <div class="header__logo">
                            <a href="./index.html"><img src="{{('templateUser/img/logo.png')}}" alt=""></a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__links">                                
                                {{-- <a href="#"><img src="{{('templateUser/img/icon/heart.png')}}" alt=""></a> --}}
                            </div>
                            <div class="header__top__right__cart">
                                @if (Auth::check())
                                <a href="#"><img src="{{('templateUser/img/icon/cart.png')}}" alt=""> <span>0</span></a>
                                <div class="cart__price">Cart: <span>Rp. 0.00</span></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.navbar')
            </div>
        </div>
    </div>
</header>