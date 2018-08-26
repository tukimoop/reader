<!-- Dropdown -->
{{--<div class="dropdown mr-4 d-lg-flex">--}}

    {{--<!-- Toggle -->--}}
    {{--<a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
        {{--<span class="icon active">--}}
          {{--<i class="fe fe-bell"></i>--}}
        {{--</span>--}}
    {{--</a>--}}

    {{--<!-- Menu -->--}}
    {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-card">--}}
        {{--<div class="card-header">--}}
            {{--<div class="row align-items-center">--}}
                {{--<div class="col">--}}

                    {{--<!-- Title -->--}}
                    {{--<h5 class="card-header-title">--}}
                        {{--Notifications--}}
                    {{--</h5>--}}

                {{--</div>--}}
                {{--<div class="col-auto">--}}

                    {{--<!-- Link -->--}}
                    {{--<a href="#!" class="small">--}}
                        {{--View all--}}
                    {{--</a>--}}

                {{--</div>--}}
            {{--</div> <!-- / .row -->--}}
        {{--</div> <!-- / .card-header -->--}}
        {{--<div class="card-body">--}}

            {{--<!-- List group -->--}}
            {{--<div class="list-group list-group-flush my--3">--}}
                {{--<a class="list-group-item px-0" href="#!">--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-auto">--}}

                            {{--<!-- Avatar -->--}}
                            {{--<div class="avatar avatar-sm">--}}
                                {{--<img src="{{ asset('assets/modules/admin/img/avatars/profiles/avatar-1.jpg') }}" alt="..." class="avatar-img rounded-circle">--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="col ml--2">--}}

                            {{--<!-- Content -->--}}
                            {{--<div class="small text-muted">--}}
                                {{--<strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="col-auto">--}}

                            {{--<small class="text-muted">--}}
                                {{--2m--}}
                            {{--</small>--}}

                        {{--</div>--}}
                    {{--</div> <!-- / .row -->--}}

                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div> <!-- / .dropdown-menu -->--}}

{{--</div>--}}

<!-- Dropdown -->
<div class="dropdown">

    <!-- Toggle -->
    <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="..." class="avatar-img rounded-circle">
    </a>

    <!-- Menu -->
    <div class="dropdown-menu dropdown-menu-right">
        <a href="/" class="dropdown-item">Back to Site</a>
        <hr class="dropdown-divider">
        <!-- Logout -->
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</div>