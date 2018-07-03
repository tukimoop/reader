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
                    General Settings
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
                        <a href="#" class="nav-link  {{ Route::currentRouteNamed('admin.system.general') ? 'active' : '' }}">
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ Route::currentRouteNamed('admin.system.security') ? 'active' : '' }}">
                            Security
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ Route::currentRouteNamed('admin.system.performance') ? 'active' : '' }}">
                            Performance
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>