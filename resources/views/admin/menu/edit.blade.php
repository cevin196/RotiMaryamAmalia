@extends('admin.layouts.app')
@section('page-title', 'Tambah Menu')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Edit Menu</h5>
            <a href="{{route('menu.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('menu.update', $menu)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control form-group" id="name" placeholder="Contoh: Roti Maryam Coklat" value="{{$menu->name}}">
                @if ($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="price" >Harga</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="0" value="{{$menu->price}}">
                            @if ($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="picture">Gambar</label>
                            <input type="file" name="picture" id="picture" class="form-control" value="{{$menu->picture}}">
                            @if ($errors->has('picture'))
                            <span class="text-danger">{{$errors->first('picture')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <label for="descripntion">Deskripsi</label>
                <textarea name="descripntion" id="descripntion" rows="4" class="form-control mb-3">{{$menu->desctiption}}</textarea>

                

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection