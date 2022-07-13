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
                                class="btn btn-outline-warning">Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                            <a href="{{route('login')}}" class="btn btn-outline-warning">Masuk</a>
                            @endif
                        </div>
                        <div class="header__logo" style=" margin-left: -120px" >
                            <a href="{{route('dashboard')}}"><img src="{{('/templateUser/img/logoFix.png')}}" alt=""></a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__links">                                
                            </div>
                            @if (Auth::check())

                                @livewire('cart-total')

                            @endif
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