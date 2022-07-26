@extends('admin.layouts.app')
@section('page-title', 'Edit Akun')

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Edit Akun</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.update', $user)}}" method="POST">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control form-group" id="name"
                                placeholder="Nama ..." value="{{$user->name}}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{$errors->first('nama')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-group"
                                value="{{$user->email}}">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Change Password
                </button>

                <div class="w-100 d-flex flex-row justify-content-center mt-3">
                    <button type="submit" class="btn btn-success mx-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.changePassword')}}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="OldPassword" class="form-label">Old Password</label>
                    <input type="password" name="old_password" class="form-control form-group" id="oldPassword"
                        placeholder="Old Password">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control form-group" id="password"
                        placeholder="New Password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
