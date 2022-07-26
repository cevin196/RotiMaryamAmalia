@extends('admin.layouts.app')
@section('page-title', 'Admin Dashboard')

@section('content')
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon purple">
                        <i class="iconly-boldShow"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Menu</h6>
                    <h6 class="font-extrabold mb-0">{{$menuCount}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon blue">
                        <i class="iconly-boldProfile"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Pesanan</h6>
                    <h6 class="font-extrabold mb-0">{{$orderCount}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon green">
                        <i class="iconly-boldAdd-User"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Pesanan Selesai</h6>
                    <h6 class="font-extrabold mb-0">{{$completedOrderCount}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body py-4 px-5">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="assets/images/faces/1.jpg" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold text-capitalize">{{Auth::user()->role}}</h5>
                    <h6 class="text-muted mb-0">{{Auth::user()->name}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Profile Visit</h4>
        </div>
        <div class="card-body">
            <div id="chart-profile-visit"></div>
        </div>
    </div>
</div> --}}
@endsection

@section('script')
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>
@endsection