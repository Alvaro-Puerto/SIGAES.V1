<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark bg-white">
    <div class="container px-4 text-dark">
        <a class="navbar-brand" href="{{ route('home') }}">
            <h1 class="font-weight-bold">SIGAES</h1>
            <small class="text-dark">Sistema de gestión academica</small>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <h1>SIGAES</h1>
                        <small>Sistema de gestión academica</small>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto text-dark">
                <li class="nav-item">
                    <!--
                    <a class="nav-link nav-link-icon text-dark" href="{{ route('home') }}">
                        <i class="ni ni-planet"></i>
                        <span class="nav-link-inner--text">{{ __('Dashboard') }}</span>
                    </a> -->
                </li>
                <li class="nav-item">
                    <!--
                    <a class="nav-link nav-link-icon text-dark" href="{{ route('register') }}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Registrarse') }}</span>
                    </a>-->
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon btn btn-border text-dark" href="{{ route('login') }}">
                        <i class="ni ni-key-25 text-success"></i>
                        <span class="nav-link-inner--text">{{ __('Iniciar sesión') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <!--
                    <a class="nav-link nav-link-icon text-dark" href="{{ route('profile.edit') }}">
                        <i class="ni ni-single-02"></i>
                        <span class="nav-link-inner--text">{{ __('Profile') }}</span>
                    </a> -->
                </li>
            </ul>
        </div>
    </div>
</nav>