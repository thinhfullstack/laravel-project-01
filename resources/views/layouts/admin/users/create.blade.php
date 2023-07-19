@extends('layouts.admin')
@section('pageTitle', 'Admin Create Users')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@section('content')
    <div class="text">
        <h2>Form {{ $title }}</h2>
    </div>
    <form action="" method="">
        <div class="form-group">
            <label for="">Email:</label>
            <input class="form-control" type="text" placeholder="Nhập email để đăng ký...">
        </div>
        <div class="form-group">
            <label for="">Password:</label>
            <input class="form-control" type="text" placeholder="Nhập password để đăng ký...">
        </div>
        <div class="form-group">
            <button class="btn btn-save" type="submit">Save</button>
            <button class="btn btn-cancel " type="submit">Cancel</button>
        </div>
    </form>
@endsection