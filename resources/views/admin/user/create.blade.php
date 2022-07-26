@extends('admin.layouts.app')
@section('page-title', 'Kelola Pengguna')


@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Tambah Pengguna</h5>
            <a href="{{route('user.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control form-group" id="name" placeholder="Nama Penguna...">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="price" >Harga</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="picture">Gambar</label>
                            <input type="file" name="picture" id="picture" class="form-control">
                        </div>
                    </div>
                </div>
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="form-control mb-3"></textarea>

                

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection