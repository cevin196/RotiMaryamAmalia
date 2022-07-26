@extends('admin.layouts.app')
@section('page-title', 'Detail Kota Menu')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Kota</h5>
            <a href="{{route('menu.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <table class="w-50 mt-3 " >
                <tr>
                    <td style="width: 30%">Nama</td>
                    <td>:</td>
                    <td>{{$city->name}}</td>
                </tr>

                <tr>
                    <td>Ongkos Kirim </td>
                    <td>:</td>
                    <td>{{rupiah($city->shipping_cost)}}</td>                    
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
