@extends('admin::layouts.admin')

@section('pageTitle', 'Dashboard')

@section('content')

    <!-- Header -->
    <div class="header mt-md-3">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        Dashboard
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        Hi, {{ Auth::user()->name }}
                    </h1>

                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 order-lg-2">

                    <!-- Image -->
                    <div class="text-center">
                        <img src="{{ asset('assets/modules/admin/img/illustrations/happiness.svg') }}" alt="..." class="img-fluid mt--5 mt-lg-0 mb-4 mr-md--5" style="max-width: 272px;">
                    </div>

                </div>
                <div class="col-12 col-lg-8 px-4 py-3 order-lg-1">

                    <!-- Title -->
                    <h2>
                        {{ __('admin::dashboard.getting-started-congratulations') }}
                    </h2>

                    <!-- Content -->
                    <p class="text-muted">
                        {{ __('admin::dashboard.getting-started-information') }}
                    </p>

                    <!-- Button -->
                    <a href="{{ route('admin.system.settings.general') }}" class="btn btn-primary">
                        {{ __('admin::dashboard.getting-started-button') }}
                    </a>

                </div>
            </div> <!-- / .row -->
        </div>
    </div>

@endsection