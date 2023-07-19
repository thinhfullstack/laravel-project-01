@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-3 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="fe fe-users"></i>
                        </span>
                        <div class="dash-count">
                            <a href="#" class="count-title">Thành viên</a>
                            <a href="#" class="count"> 10,320</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-warning">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                        </span>
                        <div class="dash-count">
                            <a href="#" class="count-title">Danh mục</a>
                            <a href="#" class="count"> 14,628</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-danger">
                            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        </span>
                        <div class="dash-count">
                            <a href="#" class="count-title">Sản phẩm</a>
                            <a href="#" class="count"> 2,980</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-info">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span>
                        <div class="dash-count">
                            <a href="#" class="count-title">Đơn đặt hàng</a>
                            <a href="#" class="count"> 2,980</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
