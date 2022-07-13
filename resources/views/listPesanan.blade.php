@extends('layouts.app')
@include('includes.formater')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>List Pesanan</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>List Pesanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Wishlist Section Begin -->
    <section class="wishlist spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wishlist__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal Pesanan</th>
                                    <th>Total</th>
                                    <th class="text-center">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $pesanan)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$pesanan->tanggal}}</h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{rupiah($pesanan->total + $pesanan->city->shipping_cost)}}</td>
                                    <td class="cart__stock text-center"><span class="badge 
                                        @php
                                            if($pesanan->status=="settlement"){
                                                echo 'bg-success';
                                            }elseif ($pesanan->status == "Batal") {
                                                echo 'bg-danger';
                                            }elseif ($pesanan->status == 'pending') {
                                                echo 'bg-warning';
                                            }else {
                                                echo 'bg-secondary';
                                            }
                                        @endphp
                                        text-white p-2">{{$pesanan->status}}</span></td>
                                    <td class="cart__btn"><a href="{{route('pesanan', $pesanan->id)}}" class="primary-btn">Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->

@endsection