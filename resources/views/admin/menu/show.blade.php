@extends('admin.layouts.app')
@section('page-title', 'Detail Menu')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Menu {{$menu->name}} </h5>
            <a href="{{route('menu.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <img class="w-25 mx-auto d-block rounded"
                src="{{($menu->picture)?asset('menu/'.$menu->picture):asset('menu/menu-default.png')}}" alt="Gambar Menu">
                <table class="w-50 mx-auto mt-3 " >
                    <tr>
                        <td style="width: 15%">Nama</td>
                        <td>:</td>
                        <td>{{$menu->name}}</td>
                    </tr>
    
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>{{rupiah($menu->price)}}</td>                    
                    </tr>
                    <tr class="align-text-top">
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{{$menu->description}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
@endsection
