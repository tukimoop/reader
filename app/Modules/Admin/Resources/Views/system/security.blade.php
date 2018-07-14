@extends('admin::layouts.admin')

@section('pageTitle', 'Security')

@section('content')

    <!-- Header -->
    @include('admin::system.partials.nav-items')

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <form action="{{ route('admin.system.settings.security.update') }}" method="post">
        {{ csrf_field() }}

        <!-- Minimum Username Length -->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <!-- Label -->
                    <label class="mb-1">
                        Minimum Username Length
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        Minimum username length for a person creating an account on your website.
                        By default, the value is <code>2</code>. The minimum value is <code>1</code>
                        and the maximum value is <code>8</code>.
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <input type="number" class="form-control" value="{{ old('min_username_length', setting('security.registration.min_name_length')) }}" placeholder="Minimum Username Length" name="min_username_length" step="1" min="1" max="8" required />
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div> <!-- / .row -->

        <!-- Enable or disable reCAPTCHA -->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <!-- Label -->
                    <label class="mb-1">
                        reCAPTCHA
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                        <a href="https://www.google.com/recaptcha" target="_blank">reCAPTCHA</a>, by Google. This prevents forms of bruteforcing and prevents bots from spamming forms (e.g. registration)
                        across your website. This also prevents scrapers from automatically downloading your images, such as comic chapters.
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 ml-md-6">
                            <select class="form-control" name="recaptcha_enabled">
                                <option value="0" {{ (setting('security.recaptcha.enabled') == true) ? 'selected' : '' }}>Enabled</option>
                                <option value="1" {{ (setting('security.recaptcha.enabled') == false) ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
        </div> <!-- / .row -->

        <div class="row mt-md-4">
            <div class="col-12 col-md-12">
                <!-- Submit -->
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </div>

    </form>

@endsection

@section('js')

    <script type="text/javascript">

    </script>

@endsection