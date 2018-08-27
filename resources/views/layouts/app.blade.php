<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lida') }} - @yield('pageTitle')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

        <!-- Global stylesheets -->
        <link href="{{ asset('assets/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
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
        <script src="{{ asset('assets/plugins/loaders/pace.min.js') }}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- /theme JS files -->

        <!-- SEO -->
        <meta property="og:site_name" content="{{ env('APP_NAME') }}">
        <meta property="og:title" content="@yield('pageTitle')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ env('APP_NAME') }}">
        <meta property="og:description" content="{{ env('APP_NAME') }} is a community with some of the highest quality comic translations.">

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

        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
                        Copyright &copy; {{ now()->format('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>.
					</span>

                    <ul class="navbar-nav ml-lg-auto">
                        <div class="navbar-text">
                            Made with
                            <i class="fa fa-heart" style="color:red;"></i>
                            by
                            <a href="https://github.com/ash123456789" target="_blank">Ash</a>.
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
