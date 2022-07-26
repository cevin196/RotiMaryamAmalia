@extends('admin.layouts.app')
@section('page-title', 'Edit Pesanan')


@include('admin.includes.formater')

@section('links')
<link rel="stylesheet" href="{{asset('/js/dselect/dselect.css')}}">
<script src="{{asset('/js/dselect/dselect.js')}}"></script>
@endsection


@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Edit Pesanan</h5>
            <div>
                <a href="{{route('order.done', $order)}}" class="btn btn-success">Tandai Selesai</a>
                <a href="{{route('order.index')}}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('order.update', $order)}}" method="POST">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-8 mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Cevin" value="{{$order->name}}">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{$order->date}}">
                        @error('date')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-6 mb-2">
                        <label for="phone_number" class="form-label">Telepon</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Contoh: 08112233" value="{{$order->phone_number}}">
                        @error('phone_number')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$order->email}}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label for="notes" class="form-label">Catatan</label>
                        <input type="text" name="notes" class="form-control" id="notes" value="{{ $order->notes}}" placeholder="Catatan pesanan (boleh kosong)">
                    </div>                    
                </div>
                <label for="address">Alamat</label>
                <textarea name="address" id="address" rows="4" class="form-control mb-3">{{$order->address}}</textarea>
                @error('address')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                @livewire('order', ['order' => $order])

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
