<li class="nav-item {{ Route::currentRouteNamed('admin.dashboard.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
        Dashboard
    </a>
</li>

<li class="nav-item {{ Route::currentRouteNamed('admin.content.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.content.comics') }}">
        Content
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.system.general') }}">
        Members
    </a>
</li>

<li class="nav-item {{ Route::currentRouteNamed('admin.system.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.system.general') }}">
        System
    </a>
</li>