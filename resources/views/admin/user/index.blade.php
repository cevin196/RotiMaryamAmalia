@extends('admin.layouts.app')
@section('page-title', 'Kelola Pengguna')

@section('links')
<link rel="stylesheet" href="{{asset('admin/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
@endsection

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Tabel Users</h5>           
        </div>
        <div class="card-body">
            <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Tipe</th>
                                    <th class="col-1">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telepon}}</td>
                                    <td>{{$user->tipe}}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="{{route('user.edit', $user)}}" type="button"><i
                                                    class="bi bi-pen text-warning"></i></a>
                                            <a href="{{route('user.show', $user)}}" type="button"><i
                                                class="bi bi-eye text-primary"></i></a>
                                            <form class="d-none" id="delete-{{$user->id}}" method="post"
                                                action="{{route('user.destroy',$user)}}">
                                                @csrf @method('DELETE')
                                            </form>                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('admin.includes.datatable')
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()

</script>
@endsection