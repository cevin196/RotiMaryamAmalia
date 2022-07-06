@extends('layouts.app')
@include('includes.formater')

@section('links')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-hyktMDITv2m6ljH5"></script>
@endsection


@section('content')
    
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Detail Pesanan</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{asset('dashboard')}}">Dashboard</a>
                        <span>Detail Pesanan</span>
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
                <form action="{{route('user.pesanan.store')}}" method="POST" id="paymentForm">
                    @csrf
                    <input name="paymentResponse" type="hidden" id="paymentResponse">
                    <input name="inputStatus" type="hidden" id="inputStatus">
                    <input name="pesanan_id" type="hidden" value="{{$pesanan->id}}">
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Nama<span>*</span></p>
                                        <input type="text" value="{{$pesanan->nama}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Kota<span>*</span></p>
                                        <input type="text" value="{{$pesanan->city}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <textarea name="alamat" id="" rows="5" class="form-control" disabled>{{$pesanan->alamat}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telepon<span>*</span></p>
                                        <input type="text" value="{{$pesanan->telepon}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" value="{{$pesanan->email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan<span>*</span></p>
                                <input type="text" disabled value="{{$pesanan->catatan}}">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Pesanan Anda</h6>
                                <div class="checkout__order__products">Produk <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($pesanan->menus as $pesananMenu)
                                    <li><samp>{{$loop->index + 1}}</samp> {{$pesananMenu->nama}}({{$pesananMenu->pivot->qty}}) <span>{{rupiah((int)$pesananMenu->pivot->qty * (int) $pesananMenu->harga)}}</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total <span>{{rupiah($pesanan->total)}}</span></li>
                                </ul>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p> --}}
                                @if ($pesanan->status != 'settlement')
                                <button id="pay-button" class="site-btn">Bayar</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection


@section('scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        event.preventDefault();
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$pesanan->snap_token}}', {
            onSuccess: function (result) {
                alert("Pembayaran Berhasil!");
                sendRersultForm(result);
            },
            onPending: function (result) {
                alert("Status Pembayaran: Pending");
                sendRersultForm(result);
            },
            onError: function (result) {
                alert("Pembayaran Gagal!");
                sendRersultForm(result);
            },
            onClose: function () {
                alert('Anda belum menyelesaikan pembayaran!');
            }
        })
    });

    function sendRersultForm(result){
        event.preventDefault();
        document.getElementById('paymentResponse').value = JSON.stringify(result);
        document.getElementById('inputStatus').value = status;
        document.getElementById('paymentForm').submit();      
    }
</script>
@endsection