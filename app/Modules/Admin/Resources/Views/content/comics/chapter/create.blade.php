@extends('admin::layouts.admin')

@section('pageTitle', 'Create a Chapter')

@section('content')

    <div class="header">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        Content
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        @yield('pageTitle')
                    </h1>

                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Card -->
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ route('admin.content.comics.chapters.store', ['comic' => $comic->slug]) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Comic Information -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of the chapter">
                        </div>

                        <div class="form-group">
                            <label for="name_native">Native Name</label>
                            <input type="text" class="form-control" name="name_native" placeholder="Name of the chapter in its original language">
                        </div>


                        <div class="form-group">
                            <label for="name_native">Chapter Number</label>
                            <input type="number" class="form-control" name="number" value="{{ $comic->chapters()->count() + 1 }}">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="comic_id" placeholder="Comic ID" value="{{ $comic->id }}" hidden>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="name_native">Release Date</label>
                            <input type="date" class="form-control" name="release_date" value="{{ now()->format('Y-m-d') }}">
                            <small class="text-muted">Setting the release date in the future will <strong>not</strong> delay the release.</small>
                        </div>


                        <div class="form-group">
                            <label for="name_native">Volume</label>
                            <select class="form-control" name="comic_volume_id">
                                @foreach ($volumes as $volume)
                                    <option value="{{ $volume->id }}">{{ $volume->name or 'Volume ' . $volume->order }}</option>
                                @endforeach
                            </select>
                        </div>


                        <label>Options</label>

                        <div class="row">
                            <!-- Quiet Release -->
                            <div class="col-auto">
                                <!-- Toggle -->
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" name="quiet_release" id="quiet_release" value="1">
                                    <label class="custom-control-label" for="quiet_release"></label>
                                </div>

                            </div>
                            <div class="col ml--2">
                                <!-- Help text -->
                                <small class="text-muted">
                                    Do not show on latest releases
                                </small>
                            </div>

                            <!-- Visibility -->
                            <div class="col-auto">

                                <!-- Toggle -->
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" name="quiet_release" id="is_visible" value="1">
                                    <label class="custom-control-label" for="is_visible"></label>
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Help text -->
                                <small class="text-muted">
                                    Hide this chapter
                                </small>

                            </div>
                        </div>
                    </div>
                </div>

                <a class="btn btn-secondary float-left" href="{{ route('admin.content.comics.show', ['comic' => $comic->slug]) }}">Back to {{ $comic->name }}</a>
                <button type="submit" class="btn btn-primary float-right">Create Chapter</button>
            </form>

        </div>
    </div>

@endsection