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
        <div class="card-body text-center">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">

                    <img src="{{ asset('assets/modules/admin/img/illustrations/happiness.svg') }}" alt="..." class="img-fluid mt--5 mb-4" style="max-width: 272px;">

                    <h2>
                        {{ trans('admin::dashboard.getting-started-congratulations') }}
                    </h2>

                    <p class="text-muted">
                        {{ trans('admin::dashboard.getting-started-information') }}
                    </p>

                    <a href="#" class="btn btn-primary">
                        {{ trans('admin::dashboard.getting-started-button') }}
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection