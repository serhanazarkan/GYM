<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aydin Free Fit</title>

    <!-- Laravel CSRF Token -->
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->

    <!-- Bootstrap 4.5.3 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style/bootstrap-4.5.3/css/bootstrap.min.css') }}">

    <!-- Fontawesome 5.15.1 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/library/fontawesome-free-5.15.1-web/css/all.css') }}">

    <!-- Toastr Styling -->
    <link rel="stylesheet/less" type="text/css" href="{{asset('assets/library/toastr/toastr.min.css') }}">

    <!-- Site General Styling -->
    <link rel="stylesheet/less" type="text/css" href="{{asset('assets/style/dashboard.less') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

</head>

<body data-status="{{Session::get('site_message')}}" data-type="{{Session::get('site_message_type')}}">
<!-- Main Preloader -->
<div id="preloader" class="preloader"></div>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <i class="fa fa-cogs fa-2x"></i>
        </a>
    </nav>

<div class="row">
    <div class="card col-7">
        <h5 class="card-header">Installation</h5>
        <div class="card-body">
            {!! Form::open(['route' => ['install.add_user', 'method' => 'post']]) !!}
            {!! Form::customInput('text', 'name', 'name', null, 'form-group', 'form-control form-control-sm', __('auth.Name'), 'control-label', ['required'] ) !!}
            {!! Form::customInput('email', 'email', 'email', null, 'form-group', 'form-control form-control-sm', __('auth.Email'), 'control-label', ['required'] ) !!}
            {!! Form::customInput('password', 'password', 'password', null, 'form-group', 'form-control form-control-sm', __('auth.Password'), 'control-label', ['required'] ) !!}
            {!! Form::customInput('password', 'password_confirmation', 'password_confirmation', null, 'form-group', 'form-control form-control-sm', __('auth.Password_Confirm'), 'control-label', ['required'] ) !!}
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> {{ __('actions.Save') }}
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-5">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Roles
                <div>
                    <i class="fa fa-check text-success d-none"></i>
                    <button class="btn btn-sm btn-outline-success">Install</button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Permissions
                <div>
                    <i class="fa fa-check text-success d-none"></i>
                    <button class="btn btn-sm btn-outline-success">Install</button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Assign Permissions To Roles
                <div>
                    <i class="fa fa-check text-success d-none"></i>
                    <button class="btn btn-sm btn-outline-success">Install</button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Site Settings
                <div>
                    <i class="fa fa-check text-success d-none"></i>
                    <button class="btn btn-sm btn-outline-success">Install</button>
                </div>
            </li>
        </ul>
    </div>
</div>

</body>

<!-- JQuery -->
<script src="{{ asset("assets/library/jquery/jquery-3.5.1.min.js") }}"></script>

<!-- Popper -->
<script src="{{ asset('assets/library/popper/popper.js') }}"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('assets/style/bootstrap-4.5.3/js/bootstrap.bundle.min.js') }}"></script>

<!-- Less.js -->
<script src="{{asset('assets/library/less/less.js')}}"></script>

<!-- Toastr Library -->
<script src="{{ asset('assets/library/toastr/toastr.min.js') }}"></script>

<!-- CK Editor 5 Classic Library -->
<script src="{{ asset('assets/library/ckeditor5/ckeditor.js') }}"></script>

<!-- Site Script -->
<script src="{{ asset('assets/scripts/main.js') }}"></script>
