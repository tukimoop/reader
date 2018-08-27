<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lida') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

        <!-- Global stylesheets -->
        <link href="{{ asset('assets/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/plugins/loaders/blockui.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/ui/slinky.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/ui/ripple.min.js') }}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- /theme JS files -->

    </head>
    <body>

        @include('layouts.partials.navigation')


        <!-- Page content -->
        <div class="page-content container">

            <!-- Main content -->
            <div class="content mt-2">

                @yield('content')

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </body>
</html>
