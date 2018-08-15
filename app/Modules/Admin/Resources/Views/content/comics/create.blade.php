@extends('admin::layouts.admin')

@section('pageTitle', 'Create a Comic')

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

            <form method="post" action="#">
                <div class="row">
                    <!-- Comic Information -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name of the comic" required>
                        </div>

                        <div class="form-group">
                            <label for="name_native">Native Name</label>
                            <input type="text" class="form-control" name="name_native" placeholder="Name of the comic in its original language">
                        </div>

                        <div class="form-group">
                            <label for="comic_status_id">Status</label>
                            <select class="form-control" name="comic_status_id" required>
                                @foreach ($comicStatuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="comic_status_id">Genres</label>
                            <select class="form-control js-example-basic-multiple" name="genres[]" multiple="multiple">
                                @foreach ($genres as $genre)

                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <label>Options</label>

                        <div class="row">
                            <div class="col-auto">

                                <!-- Toggle -->
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" name="is_mature" id="is_mature">
                                    <label class="custom-control-label" for="is_mature"></label>
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Help text -->
                                <small class="text-muted">
                                    This is a mature comic
                                </small>

                            </div>
                            <div class="col-auto">

                                <!-- Toggle -->
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" name="is_visible" id="is_visible">
                                    <label class="custom-control-label" for="is_visible"></label>
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Help text -->
                                <small class="text-muted">
                                    This comic can be viewed publicly
                                </small>

                            </div>
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="col-6">
                        123
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Create Comic</button>
            </form>

        </div>
    </div>

@endsection

@section('js')

    <script type="application/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                "theme": "bootstrap"
            });
        });
    </script>

@endsection