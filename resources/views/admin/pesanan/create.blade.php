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
            <a href="{{route('pesanan.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('pesanan.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-8 mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="name" placeholder="Contoh: Roti Maryam Coklat" value="{{old('nama')}}">
                        @error('nama')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-4 mb-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                        @error('tanggal')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-6 mb-2">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Contoh: 08112233" value="{{old('telepon')}}">
                        @error('telepon')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" name="catatan" class="form-control" id="catatan" value="{{ old('catatan')}}" placeholder="Catatan pesanan (boleh kosong)">
                    </div>                    
                </div>
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"></textarea>
                @error('alamat')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                @livewire('pesanan')

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
