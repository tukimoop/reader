<div class="header mt-md-5">
    <div class="header-body">
        <div class="row align-items-center">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                    Content
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                    @yield('pageTitle')
                </h1>

            </div>
        </div> <!-- / .row -->
        <div class="row align-items-center">
            <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                    <li class="nav-item">
                        <a href="{{ route('admin.content.comics') }}" class="nav-link  {{ Route::currentRouteNamed('admin.content.comics') ? 'active' : '' }}">
                            Comics
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>