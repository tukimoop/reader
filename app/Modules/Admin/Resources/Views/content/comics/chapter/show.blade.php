@extends('admin::layouts.admin')

@section('pageTitle', 'Chapter ' . $chapter->number)

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" />

    <div class="header">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        {{ $comic->name }}
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        @yield('pageTitle')
                    </h1>

                </div>
                <div class="col-auto">

                    <!-- Button -->
                    <a href="{{ route('admin.content.comics.show', $comic->id) }}" class="btn btn-outline-primary">
                        Back to {{ $comic->name }}
                    </a>

                    <a href="{{ route('admin.content.comics.chapters.announce', ['comic' => $comic->id, 'chapter' => $chapter->id]) }}" class="btn btn-outline-success">
                        Announce Chapter {{ $chapter->number }}
                    </a>

                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    <!-- Flash Messages -->
    @include('admin::layouts.partials.flash')

    <div class="card">
        <div class="card-header">
             Images
        </div>

        <div class="card-body">
            <form action="{{ route('admin.content.comics.chapters.upload', ['comic' => $comic->id, 'chapter' => $chapter->id]) }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                @csrf
            </form>
        </div>
    </div>

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.1/clipboard.min.js"></script>

    <script>
        Dropzone.options.myDropzone = {
            paramName: 'file',
            maxFilesize: 10, // MB
            maxFiles: 150,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
        };

        $('.thumb-url').tooltip({
            trigger: 'click',
            placement: 'bottom'
        });

        function setTooltip(btn, message) {
            $(btn).tooltip('hide')
                .attr('data-original-title', message)
                .tooltip('show');
        }

        function hideTooltip(btn) {
            setTimeout(function() {
                $(btn).tooltip('hide');
            }, 500);
        }

        var clipboard = new Clipboard('.thumb-url');

        clipboard.on('success', function(e) {
            e.clearSelection();
            setTooltip(e.trigger, 'Copied!');
            hideTooltip(e.trigger);
        });

        clipboard.on('error', function(e) {
            e.clearSelection();
            setTooltip(e.trigger, 'Failed');
            hideTooltip(e.trigger);
        });
    </script>

@endsection