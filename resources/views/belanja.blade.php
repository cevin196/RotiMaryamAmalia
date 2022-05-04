@extends('layouts.app')

@include('admin.includes.formater')

@section('content')
<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="shop__option__search">
                        <form action="{{route('belanja')}}">
                            <select name="kategori">
                                <option value="Roti Canai">Roti Canai</option>
                                <option value="">Red Velvet</option>
                                <option value="">Cup Cake</option>
                                <option value="">Biscuit</option>
                            </select>
                            <input type="text" name="search" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach ($menus as $menu)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{($menu->gambar)?asset('menu/' . $menu->gambar):'menu/menu-default.png'}}">
                        <div class="product__label">
                            <span>{{$menu->kategori}}</span>
                        </div>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$menu->nama}}</a></h6>
                        <div class="product__item__price">{{rupiah($menu->harga)}}</div>
                        <div class="cart_add">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        {{$menus->links('vendor.pagination.custom')}}
        
    </div>
</section>
@endsection