@extends("dashboard.admin")

@section('content')

    <div class="auth-image" style="background-image: url('{{ asset("images/site/salon.jpg")}}')"></div>
    <div class="row align-items-center justify-content-center auth-row">
        <div class="card col-xl-3 col-lg-4 col-md-6 col-10 auth-card px-0 border-0">
            <div class="card-header bg-success">
                <h5 class="card-title text-white">
                    <i class="fa fa-unlock"></i>
                    {{ __('auth.Login_Form') }}
                </h5>
            </div>
            {!! Form::open(['route' => ['login', 'method' => 'post']]) !!}
            <div class="card-body">
                {!! Form::customInput('email', 'email', 'email', null, 'form-group', 'form-control form-control-sm', __('auth.Email'), 'control-label auth-label', ['required'] ) !!}
                {!! Form::customInput('password', 'password', 'password', null, 'form-group', 'form-control form-control-sm', __('auth.Password'), 'control-label auth-label', ['required'] ) !!}
                <div class="form-group form-check text-right">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label auth-label" for="remember_me">
                        {{ __('auth.Remember_Me') }}
                    </label>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-around align-content-center bg-dark border-0">

                <a class="no-decoration-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>

                <button class="btn btn-sm btn-success">
                    <i class="fa fa-check"></i> {{ __('auth.Login') }}
                </button>
            </div>
            {!! Form::close() !!}

            <div class="col-12 text-center p-4">
                <a class="no-decoration-link" href="{{ route('register') }}">
                    {{ __('auth.Dont_Have_Account') }}
                </a>
            </div>


        </div>
    </div>






@endsection

@section('custom-scripts')
    <!--
            <script type="application/javascript">
                $(document).ready(function () {
                    ClassicEditor
                        .create( document.querySelector( '#content' ) )
                        .catch( error => {
                            console.log( error );
                        } );
                });
            </script>

            -->
@endsection
