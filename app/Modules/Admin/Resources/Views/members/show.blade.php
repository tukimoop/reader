@extends('admin::layouts.admin')

@section('sectionTitle', 'Members')

@section('pageTitle', $user->name)

@section('content')

    <!-- Header -->
    @include('admin::members.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <!-- Member List -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.members.update', $user->id) }}" enctype="multipart/form-data">
                @csrf

                <select name="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->title }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary mt-2">Update Role</button>
            </form>
        </div>
    </div>

@endsection