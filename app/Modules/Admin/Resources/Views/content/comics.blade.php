@extends('admin::layouts.admin')

@section('pageTitle', 'Comics')

@section('content')

    <!-- Header -->
    @include('admin::content.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Card -->
    {{--<div class="card card-inactive">--}}
        {{--<div class="card-body text-center">--}}

            {{--<!-- Image -->--}}
            {{--<img src="{{ asset('assets/modules/admin/img/illustrations/lost.svg') }}" alt="..." class="img-fluid" style="max-width: 182px;">--}}

            {{--<!-- Title -->--}}
            {{--<h1 class="mt-4">--}}
                {{--No comics yet--}}
            {{--</h1>--}}

            {{--<!-- Subtitle -->--}}
            {{--<p class="text-muted">--}}
                {{--Create a comic to start showing off your awesome content to the world--}}
            {{--</p>--}}

            {{--<!-- Button -->--}}
            {{--<a href="#!" class="btn btn-primary">--}}
                {{--Create Comic--}}
            {{--</a>--}}

        {{--</div>--}}
    {{--</div>--}}

    <div class="card" id="comics" data-toggle="comics" data-lists-values='["name"]'>
        <div class="card-header">

            <!-- Form -->
            <form>
                <div class="input-group input-group-flush input-group-merge">
                    <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body">

            <!-- List group -->
            <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">

                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar">
                                <img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-5.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Title -->
                            <h4 class="mb-1 name">
                                <a href="profile-posts.html">Miyah Myles</a>
                            </h4>

                            <!-- Time -->
                            <p class="small mb-0">
                                <span class="text-success">●</span> Online
                            </p>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="#!" class="btn btn-sm btn-white">
                                Add
                            </a>

                        </div>
                    </div> <!-- / .row -->

                </li>
                <li class="list-group-item px-0">

                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar">
                                <img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-5.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Title -->
                            <h4 class="mb-1 name">
                                <a href="profile-posts.html">Ryu Duke</a>
                            </h4>

                            <!-- Time -->
                            <p class="small mb-0">
                                <span class="text-success">●</span> Online
                            </p>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="#!" class="btn btn-sm btn-white">
                                Add
                            </a>

                        </div>
                    </div> <!-- / .row -->

                </li>
                <li class="list-group-item px-0">

                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar">
                                <img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-5.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Title -->
                            <h4 class="mb-1 name">
                                <a href="profile-posts.html">Glen Rouse</a>
                            </h4>

                            <!-- Time -->
                            <p class="small mb-0">
                                <span class="text-warning">●</span> Busy
                            </p>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="#!" class="btn btn-sm btn-white">
                                Add
                            </a>

                        </div>
                    </div> <!-- / .row -->

                </li>
                <li class="list-group-item px-0">

                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar">
                                <img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-5.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Title -->
                            <h4 class="mb-1 name">
                                <a href="profile-posts.html">Grace Gross</a>
                            </h4>

                            <!-- Time -->
                            <p class="small mb-0">
                                <span class="text-danger">●</span> Offline
                            </p>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="#!" class="btn btn-sm btn-white">
                                Add
                            </a>

                        </div>
                    </div> <!-- / .row -->

                </li>
            </ul>

        </div>

    </div>

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script type="application/javascript">
        var options = {
            valueNames: [ 'name', 'born' ]
        };

        var userList = new List('comics', options);
    </script>

@endsection