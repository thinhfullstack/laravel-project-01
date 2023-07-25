@extends('layouts.admin')
@section('pageTitle', 'Admin Create Customer')
@push('buttons-css')
    <link rel="stylesheet" href="{{ asset('assets/css/buttons-css.css') }}">
@endpush
@push('validate')
    <script src="{{ asset('assets/js/validate.js') }}"></script>
@endpush
@section('content')
    <div class="text">
        <h2>Form {{ $title }}</h2>
    </div>
    <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Fullname:</label>
            <input class="form-control" type="text" id="name"
                name="name" value="{{ old('name') }}"
                placeholder="Enter your fullname..."
            >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" id="email" 
                name="email" value="{{ old('email') }}"
                placeholder="Enter your email..."
            >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input class="form-control" type="text" id="phone"
                name="phone" value="{{ old('phone') }}"
                placeholder="Enter your phone..."
            >
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input class="form-control" type="text" id="address" 
                name="address" value="{{ old('address') }}"
                placeholder="Enter your address..."
            >
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Gender:</label>
            <div>
                <label for="male">Male</label>
                <input type="radio" id="male" name="gender" 
                    value="1" {{ old('gender') == '1' ? 'checked' : '' }} 
                >
                <label for="famale">Famale</label>
                <input type="radio" id="famale" name="gender"
                    value="2" {{ old('gender') == '2' ? 'checked' : '' }} 
                >
            </div>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Locations:</label>
            <div>
                <label for="hanoi">Hà Nội</label>
                <input type="radio" id="hanoi" class="js-location-block" name="location" 
                    value="1" {{ old('location') == '1' ? 'checked' : '' }}
                >
                <label for="danang">Đà Nẵng</label>
                <input type="radio" id="danang" class="js-location-block" name="location" 
                    value="2" {{ old('location') == '2' ? 'checked' : '' }}
                >
                <label for="hcm">Hồ Chí Minh</label>
                <input type="radio" id="hcm" name="location" 
                    value="3" {{ old('location') == '3' ? 'checked' : '' }}
                >
                <label for="cantho">Cần Thơ</label>
                <input type="radio" id="cantho" class="js-location-none" name="location"
                    value="4" {{ old('location') == '4' ? 'checked' : '' }}
                >
            </div>
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3 border border-secondary p-3 none-block-location" 
                <?= old('location') == 4 ? 'd-none' : false ?> >
                <div class="d-flex p-2">
                    <label class="d-flex w-50 justify-content-center align-items-center" for="">Người phụ thuộc</label>
                    <input type="text" class="form-control" name="location_member" value="{{ old('location_member') }}" />
                </div>
                @error('location_member')
                    <div class="text-danger text-center">{{ $message }}</div>
                @enderror

                <div class="d-flex p-2">
                    <label class="d-flex w-50 justify-content-center align-items-center" for="">Số năm kinh nghiệm</label>
                    <input type="text" class="form-control" name="location_year" value="{{ old('location_year') }}" />
                </div>
                @error('location_year')
                    <div class="text-danger text-center">{{ $message }}</div>
                @enderror

                <div class="d-flex p-2">
                    <label class="d-flex w-50 justify-content-center align-items-center" for="">Facebook URL</label>
                    <input type="text" class="form-control" name="location_facebook" value="{{ old('location_facebook') }}" />
                </div>
                @error('location_facebook')
                    <div class="text-danger text-center">{{ $message }}</div>
                @enderror

            </div>

        </div>
        <div class="form-group">
            <label for="file">Avatar:</label>
            <input class="form-control" type="file" id="file" name="file">
            {{-- <img src="{{ asset('storage')}} " width="100px" height="100px" alt="..."> --}}
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-save" type="submit">Save</button>
            <button class="btn btn-cancel" type="reset">Cancel</button>
        </div>
    </form>
@endsection