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
            <form action="{{route('user.update', $user)}}" method="POST">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control form-group" id="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control form-group" id="name" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="city" class="form-label">Kota</label>
                            <select name="city" id="city" class="form-select form-control form-group">
                                <option value="">-- Pesan Langsung --</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}" {{($user->city->id == $city->id)?'selected':''}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Telepon</label>
                            <input type="text" name="phone_number" name="gambar" id="phone_number" class="form-control"
                                value="{{$user->phone_number}}">
                        </div>
                    </div>
                </div>

                <label for="address">Alamat</label>
                <textarea name="address" id="address" rows="4" class="form-control mb-3">{{$user->address}}</textarea>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="tipe" role="switch" id="flexSwitchCheckChecked" {{($user->role == "Admin")?"checked":""}}>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Admin User</label>
                </div>

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
