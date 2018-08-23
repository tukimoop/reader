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
                    {{ $comic->description or 'No description provided.' }}
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

                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createVolumeModal">
                        Create a Volume
                    </button>

                </div>
            </div>

        </div>

    </div>

    <!-- Volumes -->
    <div class="accordion" id="accordionExample">

        @if ($comic->volumes->isEmpty())
            <div class="alert alert-danger">
                No volumes have been created for {{ $comic->name }}.
            </div>
        @endif

        @foreach ($comic->volumes as $volume)
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{ $volume->id }}" aria-expanded="true" aria-controls="{{ $volume->id }}">
                        {{ $volume->name }} (Volume {{ $volume->order }})
                    </button>

                    <span class="badge badge-primary">{{ $volume->language->long_name }}</span>
                </h5>
            </div>

            <div id="{{ $volume->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#{{ $volume->id }}">
                @if ($volume->chapters->isEmpty())
                    <div class="card-body text-muted">
                        No chapters have been made for this volume.

                        <a href="{{ route('admin.content.comics.chapters.create', $comic->id) }}">Click here to create a chapter.</a>
                    </div>
                @endif

                @if ($volume->chapters->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        @endforeach

    </div>

    <!-- Create Volume Modal -->
    <div class="modal fade" id="createVolumeModal" tabindex="-1" role="dialog" aria-labelledby="createVolumeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{ route('admin.content.volumes.create') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createVolumeModalLabel">Create a Volume</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name of the volume" required>
                    </div>
                    <!-- Native Name -->
                    <div class="form-group">
                        <label for="name">Native Name</label>
                        <input type="text" class="form-control" name="name_native" placeholder="The original name (native)." required>
                    </div>
                    <!-- Order -->
                    <div class="form-group">
                        <label for="name">Order</label>
                        <input type="number" class="form-control" name="order" placeholder="The volume number" value="{{ count($comic->volumes) + 1 }}" min="1" required>
                    </div>
                    <!-- Comic -->
                    <div class="form-group">
                        <input type="number" class="form-control" name="comic_id" placeholder="Comic ID" value="{{ $comic->id }}" min="1" hidden required>
                    </div>
                    <!-- Native Name -->
                    <div class="form-group">
                        <label for="name">Language</label>
                        <select name="language_id" class="form-control">
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->long_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Volume</button>
                </div>
            </form>
        </div>
    </div>

@endsection
