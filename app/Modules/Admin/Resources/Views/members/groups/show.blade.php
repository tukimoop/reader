@extends('admin::layouts.admin')

@section('sectionTitle', 'User Groups')

@section('pageTitle', $role->title)

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    {{--<div class="row">--}}

    <form action="{{ route('admin.members.groups.update') }}" method="post">
        {{ csrf_field() }}

        <!-- Information -->
        <div class="row">
            <div class="col-12 col-md-7">
                <!-- Name -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('title', $role->name) }}" disabled />
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $role->title) }}" required />
                </div>

                <!-- Level -->
                <div class="form-group">
                    <label>Level</label>
                    <input type="number" class="form-control" name="level" value="{{ old('level', $role->level) }}" min="1" required />
                </div>
            </div>
            <div class="col-12 col-md-5">
                <!-- Card -->
                <div class="card bg-light border">
                    <div class="card-body">
                        <p class="mb-2">
                            Permission Management
                        </p>

                        <p class="small text-muted mb-2">
                            There are a few things to note when managing permissions:
                        </p>

                        <ul class="small text-muted pl-4 mb-0 pt-2">
                            <li>
                                If a user group has the permission <code>everything</code>, you must first unassign the permission
                                <code>everything</code> before you can manage individual permissions. An alert will appear on this
                                page if the user group has the permission <code>everything</code>.
                            </li>
                            <li>
                                If you accidentally lock yourself out, please contact your system administrator. They
                                are a <code>Super Administrator</code> which means they can manage everything regardless of their
                                permissions.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Permissions -->
        <div class="row">
            @foreach ($abilities as $ability)
            <div class="col-12 col-md-3 mt-4">
                <div class="row">
                    <div class="col-auto">
                        <!-- Toggle -->
                        <div class="custom-control custom-checkbox-toggle">
                            <input type="checkbox" class="custom-control-input" id="{{ $ability->name }}" name="{{ $ability->name }}" checked>
                            <label class="custom-control-label" for="{{ $ability->name }}"></label>
                        </div>

                    </div>
                    <div class="col ml--2">
                        <!-- Help text -->
                        <small class="text-muted">
                            {{ $ability->title }}
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            <div class="row mt-5">
                <div class="col-12 col-md-12">
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('admin::system.buttons.save_changes') }}
                    </button>
                </div>
            </div>

    </form>


@endsection