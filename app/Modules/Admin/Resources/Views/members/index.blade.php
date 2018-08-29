@extends('admin::layouts.admin')

@section('sectionTitle', 'Members')

@section('pageTitle', 'Members')

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Member List -->
    <div class="row">
        @foreach ($members as $member)

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <a href="#" class="avatar avatar-lg">
                                    <img src="{{ asset('https://avatars2.githubusercontent.com/u/11010491?s=460&v=4') }}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <h4 class="#">
                                    <a href="#">{{ $member->name }}</a>
                                </h4>

                                <p class="card-text small text-muted mb-1">
                                    @if ($member->isOnline())
                                        <span class="text-success">●</span> Online
                                    @else
                                        Last seen {{ $member->last_seen->diffForHumans() }}
                                    @endif
                                </p>

                            </div>
                            <div class="col-auto">

                                <a href="{{ route('admin.members.show', $member->id) }}" class="btn btn-sm btn-outline-primary d-none d-md-inline-block">
                                    Manage
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{ $members->render() }}

@endsection