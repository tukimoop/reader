<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('pageTitle') - Admin Control Panel - {{ config('app.name', 'Lida') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/modules/admin/theme.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" />    </head>
    <body>
        <div id="app">
            <!-- Navigation Bar -->
            @include('admin::layouts.partials.navigation')

            <!-- Main Content -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8 mt-md-5">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/modules/admin/theme.js') }}"></script>
        <script src="{{ asset('js/modules/admin/admin.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

        @yield('js')
    </body>
</html>
