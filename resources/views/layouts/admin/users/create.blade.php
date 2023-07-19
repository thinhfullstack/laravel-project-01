@extends('layouts.admin')
@section('content')
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
            <button class="btn btn-primary btn-block" type="submit">Save</button>
        </div>
    </form>
@endsection