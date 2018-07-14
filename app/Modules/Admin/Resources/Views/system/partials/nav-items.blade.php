<div class="header mt-md-5">
    <div class="header-body">
        <div class="row align-items-center">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                    System
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    @yield('pageTitle')
                </h1>

            </div>
            <div class="col-auto">

                <!-- Button -->
                <a href="#!" class="btn btn-outline-primary">
                    Manage Modules
                </a>

            </div>
        </div> <!-- / .row -->
        <div class="row align-items-center">
            <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                    <li class="nav-item">
                        <a href="{{ route('admin.system.settings.general') }}" class="nav-link  {{ Route::currentRouteNamed('admin.system.settings.general') ? 'active' : '' }}">
                            {{ __('admin::system.navigation.general') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.system.settings.security') }}" class="nav-link {{ Route::currentRouteNamed('admin.system.settings.security') ? 'active' : '' }}">
                            {{ __('admin::system.navigation.security') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.system.settings.performance') }}" class="nav-link {{ Route::currentRouteNamed('admin.system.settings.performance') ? 'active' : '' }}">
                            {{ __('admin::system.navigation.performance') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ Route::currentRouteNamed('admin.system.settings.integration') ? 'active' : '' }}">
                            {{ __('admin::system.navigation.integration') }}
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>