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
                        Create a Volume
                    </a>

                </div>
            </div>

        </div>

    </div>

    <!-- Volumes -->

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collapsible Group Item #1
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>

@endsection
