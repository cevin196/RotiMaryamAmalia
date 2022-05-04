@extends('admin.layouts.app')
@section('page-title', 'Detail Pesanan')

@include('admin.includes.formater')

@section('content')
<script>
    var total = 0;
    function tambahTotal(subTotal){
        total += subTotal;
    }
</script>

<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Pesanan {{$pesanan->user->name}} </h5>
            <a href="{{route('pesanan.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">

            <form class="form form-horizontal">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama Customer</label>
                        </div>
                        <div class="col-md-9 form-group">
                            : {{$pesanan->user->name}}
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            : {{$pesanan->tanggal}}
                        </div>
                        <div class="col-md-3">
                            <label>Total</label>
                        </div>
                        <div class="col-md-9 form-group">
                            : <span id="total"></span>
                        </div>                                     
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan->menus as $pesanan)
                        <tr>
                            <td>{{$pesanan->nama}}</td>
                            <td>{{rupiah($pesanan->harga)}}</td>
                            <td>{{$pesanan->pivot->qty}}</td>
                            
                            @php
                                $subTotal = (int)$pesanan->pivot->qty * (int)$pesanan->harga;
                            @endphp

                            <script>
                                tambahTotal({{$subTotal}});
                            </script>
                            <td>{{rupiah($subTotal)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var bilangan = total;
	
    var	number_string = bilangan.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    // Cetak hasil
        document.getElementById('total').innerHTML = "Rp. " + rupiah;
    </script>
@endsection
