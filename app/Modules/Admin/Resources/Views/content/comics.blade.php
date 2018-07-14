@extends('admin::layouts.admin')

@section('pageTitle', 'Comics')

@section('content')

    <!-- Header -->
    @include('admin::content.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- No comics message -->
    @if ($comics->isEmpty())
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

    @else

    <div class="card" id="comics">
        <div class="card-header">

            <!-- Search -->
            <form>
                <div class="input-group input-group-flush input-group-merge">
                    <input type="search" class="form-control form-control-prepended search" placeholder="Search comics...">
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
                @foreach ($comics as $comic)
                <li class="list-group-item px-0">

                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Thumbnail -->
                            <a href="profile-posts.html" class="avatar">
                                <img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-5.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </a>

                        </div>
                        <div class="col ml--2">

                            <!-- Title -->
                            <h4 class="mb-1 name">
                                <a href="profile-posts.html">{{ $comic->name }}</a>
                            </h4>

                            <!-- Created -->
                            <p class="small mb-0 text-muted">
                                Created {{ $comic->created_at->diffForHumans() }}
                            </p>

                        </div>
                        <div class="col-auto">

                            <!-- Option -->
                            <a href="#!" class="btn btn-sm btn-outline-primary">
                                Manage
                            </a>

                        </div>
                    </div>

                </li>
                @endforeach
            </ul>

        </div>

    </div>
    @endif

@endsection

@section('js')

    <script type="application/javascript">
        let options = {
            valueNames: ['name'],
            // page: 12,
            // pagination: true
        };

        let userList = new List('comics', options);
    </script>

@endsection