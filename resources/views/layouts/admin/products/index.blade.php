@extends('layouts.admin')
@section('pageTitle', 'Admin Product')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@section('content')
<div class="row">
    <a href="{{ route('admin.product.create') }}" class="btn-button-text">
        <button class="btn-button">
            <i class="fe fe-plus"></i>
        </button>
    </a>
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h4 class="card-title float-start">Quản lý sản phẩm</h4>
                <div class="table-search float-end">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive no-radius">
                    <table class="table table-hover table-center">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tên khách hàng</th>
                                <th class="text-center">Số lượng sản phẩm</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-nowrap">
                                    <div class="font-weight-600">06456546</div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="font-weight-600">20-10-2021</div>
                                </td>
                                <td class="text-nowrap">Scott Albright</td>
                                <td class="text-center">20 Jan 2019</td>
                                <td class="text-center">
                                    15 mins ago
                                </td>
                                <td class="text-end">
                                    <div class="actions">
                                        <a href="#" class="btn btn-sm bg-success-light me-2">
                                            <i class="fe fe-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm bg-success-light me-2">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm bg-danger-light">
                                            <i class="fe fe-close"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection