@extends('admin::layouts.admin')

@section('pageTitle', 'General')

@section('content')

    <!-- Header -->
    @include('admin::system.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <form action="{{ route('admin.system.settings.general.update') }}" method="post">
        {{ csrf_field() }}

        <!-- Site Name -->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <!-- Label -->
                    <label class="mb-1">
                        {{ __('admin::system.general.site_name') }}
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        {{ __('admin::system.general.site_name_info') }}
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <input class="form-control" value="{{ old('site_name', setting('general.site.name')) }}" placeholder="{{ __('admin::system.general.site_name_placeholder') }}" name="site_name" required />
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
                        {{ __('admin::system.general.meta_desc') }}
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        {{ __('admin::system.general.meta_desc_info') }}
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <textarea class="form-control" placeholder="{{ __('admin::system.general.meta_desc_placeholder') }}" name="meta_description" rows="2" minlength="12" required>{{ old('meta_description', setting('general.meta.description')) }}</textarea>
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
                        {{ __('admin::system.general.meta_keywords') }}
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        {{ __('admin::system.general.meta_keywords_info') }}

                        <p class="mt-3">
                            {{ __('admin::system.general.meta_keywords_example') }}: <code>comics, lida, scanlation</code>
                        </p>
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <input class="form-control" value="{{ old('meta_keywords', setting('general.meta.keywords')) }}" placeholder="{{ __('admin::system.general.meta_keywords_placeholder') }}" name="meta_keywords" required />
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
                        {{ __('admin::system.general.homepage_url') }}
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        {!! __('admin::system.general.homepage_url_info') !!}
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <input class="form-control" value="{{ old('homepage_url', setting('general.site.homepage_url')) }}" placeholder="{{ __('admin::system.general.homepage_url_placeholder') }}" name="homepage_url" />
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div> <!-- / .row -->

        <div class="row mt-md-4">
            <div class="col-12 col-md-12">
                @can('manage-settings')
                <!-- Submit -->
                <button type="submit" class="btn btn-primary">
                    {{ __('admin::system.buttons.save_changes') }}
                </button>
                @endcan
            </div>
        </div>

    </form>

@endsection