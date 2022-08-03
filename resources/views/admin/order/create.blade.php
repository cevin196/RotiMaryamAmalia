@extends('admin.layouts.app')
@section('page-title', 'Tambah Pesanan')


@include('admin.includes.formater')

@section('links')
<link rel="stylesheet" href="{{asset('/js/dselect/dselect.css')}}">
<script src="{{asset('/js/dselect/dselect.js')}}"></script>
@endsection


@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Tambah Pesanan</h5>
            <a href="{{route('order.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('order.store')}}" method="POST">
                @csrf
                <div class="row gy-2 mb-3">
                    <div class="col-8 ">
                        <label for="name" class="">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Roti Maryam Coklat" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="date" class="">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                        @error('date')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="phone_number" class="">Telepon</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Contoh: 08112233" value="{{old('phone_number')}}">
                        @error('phone_number')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="city" class="">Kota</label>
                        <select name="city_id" id="city" class="form-control">
                            <option value="" disabled selected>-- Pilih Kota --</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="email" class="">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" rows="4" class="form-control"></textarea>
                        @error('address')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="notes" class="">Catatan</label>
                        <input type="text" name="notes" class="form-control" id="notes" value="{{ old('notes')}}" placeholder="Catatan pesanan (boleh kosong)">
                    </div>    
                </div>

                @livewire('order')

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
