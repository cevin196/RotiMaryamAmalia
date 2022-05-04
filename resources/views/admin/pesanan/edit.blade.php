@extends('admin.layouts.app')
@section('page-title', 'Edit Pesanan')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Edit Pesanan {{$pesanan->user->name}}</h5>
            <a href="{{route('pesanan.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('pesanan.update', $pesanan)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control form-group" id="name" placeholder="Contoh: Roti Maryam Coklat" value="{{$pesanan->nama}}">
                @if ($errors->has('nama'))
                <span class="text-danger">{{$errors->first('nama')}}</span>
                @endif
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="harga" >Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="0" value="{{$pesanan->harga}}">
                            @if ($errors->has('harga'))
                            <span class="text-danger">{{$errors->first('harga')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" value="{{$pesanan->gambar}}">
                            @if ($errors->has('gambar'))
                            <span class="text-danger">{{$errors->first('gambar')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3">{{$pesanan->deskripsi}}</textarea>

                

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection