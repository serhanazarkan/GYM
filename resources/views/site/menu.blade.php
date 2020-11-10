<nav class="navbar navbar-expand-lg navbar-light navbar-main">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">
            <img src="https://fastly.4sqi.net/img/general/558x200/62051338_4XgUjcc60eU0jv0uAou_l9P9AfTMLZQSIXn61eHLEjk.jpg">
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>

        <div>
            @guest()
            <a class="btn btn-sm btn-outline-light px-3 py-1" href="{{ route('login') }}">
                <i class="fa fa-unlock"></i> {{ __('actions.Sign_In') }}
            </a>

            <a class="btn btn-sm btn-outline-light px-3 py-1" href="{{ route('login') }}">
                <i class="fa fa-lock"></i> {{ __('actions.Sign_Up') }}
            </a>
            @endguest

            @auth()

                    <div class="dropdown">
                        <button class="btn auth-user-menu dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </div>
            @endauth
        </div>
    </div>
</nav>
