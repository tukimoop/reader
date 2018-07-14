@extends('admin::layouts.admin')

@section('sectionTitle', 'User Groups')

@section('pageTitle', $role->title)

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    {{--<div class="row">--}}


    <div class="row">
        <div class="col-12 col-md-7">

        </div>
        <div class="col-12 col-md-5">
            <!-- Card -->
            <div class="card bg-light border">
                <div class="card-body">

                    <p class="mb-2">
                        Permission Management
                    </p>

                    <p class="small text-muted mb-2">
                        There are a few things to note when managing permissions for a specific user group.
                    </p>

                    <ul class="small text-muted pl-4 mb-0 pt-2">
                        <li>
                            If a user group has the permission "everything", you must first unassign the permission
                            "everything" before you can manage individual permissions.
                        </li>
                        <li>
                            If you
                        </li>
                        <li>
                            At least one number
                        </li>
                        <li>
                            Can’t be the same as a previous password
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div> <!-- / .row -->

    {{--</div>--}}

@endsection