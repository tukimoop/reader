@extends('admin::layouts.admin')

@section('sectionTitle', 'Members')

@section('pageTitle', $user->name)

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Member List -->
    <div class="row">

    </div>

@endsection