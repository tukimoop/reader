@extends('admin::layouts.admin')

@section('pageTitle', 'Comics')

@section('content')

    <!-- Header -->
    @include('admin::content.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Card -->
    <div class="card card-inactive">
        <div class="card-body text-center">

            <!-- Image -->
            <img src="{{ asset('assets/modules/admin/img/illustrations/lost.svg') }}" alt="..." class="img-fluid" style="max-width: 182px;">

            <!-- Title -->
            <h1 class="mt-4">
                No comics yet
            </h1>

            <!-- Subtitle -->
            <p class="text-muted">
                Create a comic to start showing off your awesome content to the world
            </p>

            <!-- Button -->
            <a href="#!" class="btn btn-primary">
                Create Comic
            </a>

        </div>
    </div>

    123

    <div id="adminexample"></div>

@endsection