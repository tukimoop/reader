<nav class="navbar navbar-expand-lg navbar-light bg-white py-md-2 navbar-shadow">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex">
            <div class="input-group input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="search" class="form-control form-control-prepended dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>
            </div>
        </form>

        <div class="dropdown mr-4">
            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Create
            </button>
            <div class="dropdown-menu">
                @can('manage-comics')
                <a href="{{ route('admin.content.comics.create') }}" class="dropdown-item">Comic</a>
                @endcan
            </div>
        </div>

        <span class="top-nav-divider mr-4 d-none d-lg-flex"></span>

        <!-- User -->
        <div class="navbar-user">

            @include('admin::layouts.partials.navbar.navbar-user')

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">

                @include('admin::layouts.partials.navbar.nav-items')

            </ul>

        </div>

    </div> <!-- / .container -->
</nav>