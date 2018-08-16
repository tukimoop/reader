@extends('admin::layouts.admin')

@section('pageTitle', $comic->name)

@section('content')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <div class="card">

        <div class="dropdown card-dropdown">
            <a href="#!" class="dropdown-ellipses dropdown-toggle text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fe fe-more-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#!" class="dropdown-item">
                    Action
                </a>
                <a href="#!" class="dropdown-item">
                    Another action
                </a>
                <a href="#!" class="dropdown-item">
                    Something else here
                </a>
            </div>
        </div>

        <img src="{{ $comic->cover_url }}" alt="Cover" class="card-img-top" height="200" width="600">

        <div class="card-body text-center">

            <a href="profile-posts.html" class="avatar avatar-xl card-avatar card-avatar-top">
                <img src="{{ $comic->thumbnail_url }}" class="avatar-img rounded-circle border border-white" alt="Avatar">
            </a>

            <h2 class="card-title">
                <a href="profile-posts.html">{{ $comic->name }}</a>
            </h2>

            <p class="card-text text-muted">
                <small>
                    Lida best girl.
                </small>
            </p>

            <p class="card-text">
                @foreach ($comic->genres as $genre)
                <span class="badge badge-soft-secondary">
                    {{ $genre->name }}
                </span>
                @endforeach
            </p>

            <hr>

            <div class="row align-items-center justify-content-between">
                <div class="col-auto">

                    <small class="text-muted">
                        Created {{ $comic->created_at->diffForHumans() }}
                    </small>

                </div>
                <div class="col-auto">

                    <a href="#!" class="btn btn-sm btn-primary">
                        Options
                    </a>

                </div>
            </div>

        </div>

    </div>

@endsection
