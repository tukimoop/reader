@extends('admin::layouts.admin')

@section('pageTitle', 'System')

@section('content')

    <!-- Header -->
    @include('admin::system.partials.nav-items')

    <!-- Site Name -->
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <!-- Label -->
                <label class="mb-1">
                    Site Name
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    The name of your website. This appears at the top of every page, emails and other areas of the website.
                </small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-8 ml-md-6">
                        <input class="form-control" value="@setting('general.site.name')" placeholder="The name of your website" name="site_name" required/>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div> <!-- / .row -->

    <!-- Meta Description -->
    <div class="row mt-md-4">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <!-- Label -->
                <label class="mb-1">
                    Meta Description
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    Enter a description for your website. This will be displayed public on search engines and other areas of your site.
                </small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-8 ml-md-6">
                        <input class="form-control" value="@setting('general.meta.description')" placeholder="Description of your site" name="meta_description" required/>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div> <!-- / .row -->

    <!-- Meta Keywords -->
    <div class="row mt-md-4">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <!-- Label -->
                <label class="mb-1">
                    Meta Keywords
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    Keywords help people find your site by allowing search engines (e.g. Google, Bing) to index your site better.
                    It is ideal to keep all the words lowercase. Please make sure you separate each keyword with a comma.

                    <p class="mt-3">
                        Example: <code>comics, lida, scanlation</code>
                    </p>
                </small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-8 ml-md-6">
                        <input class="form-control" value="@setting('general.meta.keywords')" placeholder="Keywords that describe your site." name="meta_description" required/>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div> <!-- / .row -->

    <!-- Homepage URL -->
    <div class="row mt-md-4">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <!-- Label -->
                <label class="mb-1">
                    Homepage URL
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                    By default the <code>Home</code> button on the navigation bar redirects to the Lida Reader homepage. If you
                    would like to override this enter a custom URL here. This is useful if you have installed Lida Reader
                    within a directory (e.g. <code>https://example.co.uk/reader</code>) or if you use a sub-domain.
                </small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-8 ml-md-6">
                        <input class="form-control" value="@setting('general.homepage.url')" placeholder="Homepage URL" name="meta_description" required/>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div> <!-- / .row -->

@endsection