@extends('admin.layouts.app')
@section('page-title', 'Edit Kota')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Edit Menu</h5>
            <a href="{{route('city.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('city.update', $city)}}" method="POST">
                @csrf @method('PUT')
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control form-group" id="name" placeholder="Contoh: Yogyakarta" value="{{$city->name}}">
                @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    <br>
                @enderror

                <label for="shippingCost" class="form-label">Ongkos Kirim</label>
                <input type="number" name="shipping_cost" class="form-control form-group" id="shipingCost" placeholder="Contoh: 15000" value="{{$city->shipping_cost}}">
                @error('shipping_cost')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection