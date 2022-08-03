@extends('admin.layouts.app')
@section('page-title', 'Pesanan')

@section('links')
<link rel="stylesheet" href="{{asset('admin/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
@endsection

@include('admin.includes.formater')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="col-3">Tabel Pesanan</h5>
            <a href="{{route('order.create')}}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">No</th>
                                    <th>Nama Customer</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th class="col-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                    <td>{{($order->name)}}</td>
                                    <td>{{$order->date}}</td>
                                    <td>{{rupiah($order->total)}}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            @if ($order->status=="done")
                                            <a href="{{route('order.print', $order)}}" type="button"><i
                                                class="bi bi-printer text-primary"></i></a>
                                            @else
                                            <a href="{{route('order.edit', $order)}}" type="button"><i
                                                    class="bi bi-pen text-warning"></i></a>
                                            <a href="{{route('order.show', $order)}}" type="button"><i
                                                class="bi bi-eye text-success"></i></a>
                                            
                                            <form class="d-none" id="delete-{{$order->id}}" method="post"
                                                action="{{route('order.destroy',$order)}}">
                                                @csrf @method('DELETE')
                                            </form>
                                            <a href="#"
                                                onclick="document.getElementById('delete-{{$order->id}}').submit();"><i
                                                    class="bi bi-trash text-danger"></i></a>
                                            @endif
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