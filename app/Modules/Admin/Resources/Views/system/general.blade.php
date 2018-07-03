@extends('admin::layouts.admin')

@section('pageTitle', 'System')

@section('content')

    <!-- Header -->
    @include('admin::system.partials.nav-items')


    <div class="row">
        <div class="col-12 col-md-6">

            <!-- Public profile -->
            <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                    Site Name
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    The name of your website. This appears at the top of every page, emails and other areas of the website.
                </small>

                <div class="row mt-4">
                    <div class="col-8">

                        <input class="form-control" value="Lida" />

                    </div>
                </div> <!-- / .row -->
            </div>

        </div>
        <div class="col-12 col-md-6">

            <!-- Allow for additional Bookings -->
            <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                    Another Setting
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    Stuff goes here...
                </small>

                <div class="row mt-4">
                    <div class="col-8">

                        <input class="form-control" value="Lida" />

                    </div>
                </div> <!-- / .row -->
            </div>

        </div>
    </div> <!-- / .row -->

@endsection