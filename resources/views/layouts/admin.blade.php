<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.partitions.head')
</head>

<body>

    {{-- header --}}
    @include('layouts.admin.partitions.header')

    <div class="main-wrapper">

        {{-- sidebar --}}
        @include('layouts.admin.partitions.sidebar')

        <div class="page-wrapper">
            <div class="content container-fluid">
                {{-- content --}}
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.admin.partitions.footer')
</body>

</html>