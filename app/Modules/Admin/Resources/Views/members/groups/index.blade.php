@extends('admin::layouts.admin')

@section('pageTitle', 'User Groups')

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <div class="card" id="groups">
        <div class="card-header">

            <!-- Search -->
            <form>
                <div class="input-group input-group-flush input-group-merge">
                    <input type="search" class="form-control form-control-prepended search" placeholder="Search groups...">
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
                @foreach ($userGroups as $group)
                    <li class="list-group-item px-0">

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Thumbnail -->
                                <a href="{{ route('admin.members.groups.show', $group->id) }}" class="avatar">
                                    <img src="{{ Avatar::create($group->title)->toBase64() }}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="mb-1 name">
                                    <a href="{{ route('admin.members.groups.show', $group->id) }}">{{ str_plural($group->title) }}</a>
                                </h4>

                                <!-- Created -->
                                <p class="small mb-0 text-muted">
                                    Created {{ $group->created_at->diffForHumans() }}
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Option -->
                                <a href="{{ route('admin.members.groups.show', $group->id) }}" class="btn btn-sm btn-outline-primary">
                                    Manage
                                </a>

                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

        </div>

    </div>

@endsection

@section('js')

    <script type="application/javascript">
        let options = {
            valueNames: ['name', 'title'],
            // page: 12,
            // pagination: true
        };

        let userList = new List('groups', options);
    </script>

@endsection