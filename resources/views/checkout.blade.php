@extends('layouts.app')

@include('includes.formater')

@section('content')
    
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{asset('dashboard')}}">Dashboard</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Nama<span>*</span></p>
                                        <input type="text" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <textarea name="alamat" id="" rows="5" class="form-control">{{Auth::user()->alamat}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telepon<span>*</span></p>
                                        <input type="text" value="{{Auth::user()->telepon}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan<span>*</span></p>
                                <input type="text"
                                placeholder="Catatan tambahan untuk pesanan anda">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Pesanan Anda</h6>
                                <div class="checkout__order__products">Produk <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($cart as $item)
                                    <li><samp>{{$loop->index + 1}}</samp> {{$item->name}} <span>{{rupiah((int)$item->qty * (int) $item->price)}}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total <span>Rp. {{Gloudemans\Shoppingcart\Facades\Cart::priceTotal()}}</span></li>
                                </ul>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> --}}
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Pesan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection