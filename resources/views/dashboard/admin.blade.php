<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body data-status="{{Session::get('site_message')}}" data-type="{{Session::get('site_message_type')}}">
<!-- Main Preloader -->
<div id="preloader" class="preloader"></div>

<div class="container-fluid app d-none" id="app">
    <div class="row">
        <!-- Main Sidebar -->
        <div class="col-12">
            @include('dashboard.menu')
        </div>
        <!-- Site Content -->
        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>

<!-- Javascript Libraries -->
@include('layouts.footer')

<!-- Defined Javascript Codes -->
@yield('custom-scripts')
</body>
</html>
