<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-black navbar">
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
                            <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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

            <!-- Left-->
            <ul class="navbar-nav navbar-nav-highlight">

                <li class="nav-item">
                    <a href="{{ route('reader.index') }}" class="navbar-nav-link">
                        <i class="icon-home mr-2"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reader.latest') }}" class="navbar-nav-link">
                        <i class="icon-stack-up mr-2"></i>
                        Latest
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reader.comics') }}" class="navbar-nav-link">
                        <i class="icon-books mr-2"></i>
                        Comics
                    </a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav navbar-nav-highlight ml-auto">

                <li class="nav-item">
                    <a href="https://www.patreon.com/PsychoPlay" class="navbar-nav-link" target="_blank">
                        <i class="icon-rocket mr-2"></i>
                        Patreon
                    </a>
                </li>

                <li class="nav-item">
                    <a href="https://discord.gg/gVzPr6W" class="navbar-nav-link" target="_blank">
                        <i class="icon-plus22 mr-2"></i>
                        Discord
                    </a>
                </li>

            </ul>

        </div>
    </div>
</div>
<!-- /secondary navbar -->