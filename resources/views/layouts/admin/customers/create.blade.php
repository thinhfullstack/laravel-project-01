@extends('layouts.admin')
@section('pageTitle', 'Admin Create Customer')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@section('content')
    <div class="text">
        <h2>Form {{ $title }}</h2>
    </div>
    <form action="" method="">
        <div class="form-group">
            <label for="">Fullname:</label>
            <input class="form-control" type="text" placeholder="Enter your fullname...">
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input class="form-control" type="text" placeholder="Enter your email...">
        </div>
        <div class="form-group">
            <label for="">Birthday:</label>
            <input class="form-control" type="date" placeholder="Enter your birthday...">
        </div>
        <div class="form-group">
            <label for="">Phone:</label>
            <input class="form-control" type="text" placeholder="Enter your phone...">
        </div>
        <div class="form-group">
            <label for="">Address:</label>
            <input class="form-control" type="text" placeholder="Enter your address...">
        </div>
        <div class="form-group">
            <label for="">Avatar:</label>
            <input class="form-control" type="file">
        </div>
        <div class="form-group">
            <button class="btn btn-save" type="submit">Save</button>
            <button class="btn btn-cancel " type="submit">Cancel</button>
        </div>
    </form>
@endsection