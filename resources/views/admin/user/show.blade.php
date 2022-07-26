@extends('admin.layouts.app')
@section('page-title', 'Kelola Pengguna')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Data Pengguna</h5>
            <a href="{{route('user.index')}}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control form-group" id="name" value="{{$user->name}}" disabled>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="name" class="form-label">Tipe User</label><br>
                        <input type="text" class="form-control form-group text-capitalize" value="{{$user->role}}" disabled>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control form-group" id="name" value="{{$user->email}}" disabled>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="gambar" id="telepon" class="form-control" value="{{$user->phone_number}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
            <label for="city" class="form-label">Kota</label>
            <input type="text" class="form-control form-group" id="city" value="{{($user->city != "")?$user->city->name:''}}" disabled>
                    </div>
                </div>
            </div>

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" disabled>{{$user->address}}</textarea>



            <div class="w-100 d-flex flex-row justify-content-center mt-3">
                <button type="submit" class="btn btn-success mx-2">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection
