@extends('layouts.admin')
@section('pageTitle', 'Admin Create Product')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@section('content')
    <div class="text">
        <h2>Form {{ $title }}</h2>
    </div>
    <form action="" method="">
        <div class="form-group">
            <label for="">Name:</label>
            <input class="form-control" type="text" placeholder="Enter your name...">
        </div>
        <div class="form-group">
            <label for="">Price:</label>
            <input class="form-control" type="text" placeholder="Enter your price...">
        </div>
        <div class="form-group">
            <button class="btn btn-save" type="submit">Save</button>
            <button class="btn btn-cancel " type="submit">Cancel</button>
        </div>
    </form>
@endsection