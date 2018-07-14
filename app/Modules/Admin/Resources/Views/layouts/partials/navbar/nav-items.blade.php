<li class="nav-item {{ Route::currentRouteNamed('admin.dashboard.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
        Dashboard
    </a>
</li>

@can('view-content')
<li class="nav-item {{ Route::currentRouteNamed('admin.content.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.content.comics') }}">
        Content
    </a>
</li>
@endcan

@can('view-members')
<li class="nav-item {{ Route::currentRouteNamed('admin.members.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.members.index') }}">
        Members
    </a>
</li>
@endcan

@can('view-settings')
<li class="nav-item {{ Route::currentRouteNamed('admin.system.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.system.general') }}">
        System
    </a>
</li>
@endcan