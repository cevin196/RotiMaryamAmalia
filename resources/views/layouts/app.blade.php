<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roti Maryam Amalia</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.links')

    @livewireStyles

</head>

<body>
    @include('includes.toast')
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="{{asset('templateUser/img/icon/search.png')}}" alt=""></a>
                <a href="#"><img src="{{asset('templateUser/img/icon/heart.png')}}" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="{{asset('templateUser/img/icon/cart.png')}}" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{asset('templateuser/img/logo.png')}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('layouts.header')
    <!-- Header Section End -->

    <!-- Hero Section End -->
    @section('content')
        
    @show
    <!-- Footer Section Begin -->
    @include('layouts.footer')
<!-- Footer Section End -->


<!-- Js Plugins -->
@include('layouts.scripts')

@if (\Session::has('success'))
    <script>
        $( document ).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endif

@livewireScripts
</body>

</html>