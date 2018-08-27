<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-black">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ env('APP_URL') }}" class="navbar-nav-link">
                    {{ env('APP_NAME') }}
                </a>
            </li>
        </ul>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav ml-auto">

                @auth
                    @can('access-admin')
                        <li class="nav-item">
                            <a class="navbar-nav-link" href="{{ route('admin.dashboard.index') }}">{{ __('Admin') }}</a>
                        </li>
                    @endcan
                    <li class="nav-item dropdown dropdown-user">
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="../../../../global_assets/images/image.png" class="rounded-circle" alt="">
                            <span>{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                        </div>
                    </li>
                @endauth

                @guest
                    <li><a data-toggle="modal" data-target="#login-modal"><i class="icon-reading mr-2"></i> Login</a></li>
                @endguest
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->

<!-- Secondary navbar -->
<div class="navbar navbar-expand-md navbar-light px-0">
    <div class="container position-relative">
        <div class="text-center d-md-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
                <i class="icon-unfold mr-2"></i>
                Navigation
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-navigation">
            <ul class="navbar-nav navbar-nav-highlight">
                <li class="nav-item">
                    <a href="../full/index.html" class="navbar-nav-link">
                        <i class="icon-home mr-2"></i>
                        Home
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /secondary navbar -->