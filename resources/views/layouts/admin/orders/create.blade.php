@extends('layouts.admin')
@section('pageTitle', 'Admin Create Order')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@section('content')
    <div class="text">
        <h2>Form {{ $title }}</h2>
    </div>
    <form action="{{ route('admin.order.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_name">Order Name:</label>
            <input class="form-control" id="order_name" 
                name="order_name" value="{{ old('order_name') }}" 
                type="text" placeholder="Enter your order name..."
            >
            @error('order_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input class="form-control" id="price" 
                name="order_price" value="{{ old('order_price') }}" 
                type="text" placeholder="Enter your order price..."
            >
            @error('order_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-save" name="btn-save" type="submit">Save</button>
            <button class="btn btn-cancel" type="reset">Cancel</button>
        </div>
    </form>
@endsection