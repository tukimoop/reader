@extends('admin::layouts.admin')

@section('pageTitle', 'Chapter ' . $chapter->number . ' - ' . $chapter->name)

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

                    <!-- Back to Comic Overview -->
                    <a href="{{ route('admin.content.comics.show', $comic->id) }}" class="btn btn-outline-primary">
                        Back to {{ $comic->name }}
                    </a>

                    <!-- Announce on Discord -->
                    <a href="{{ route('admin.content.comics.chapters.announce', ['comic' => $comic->id, 'chapter' => $chapter->id]) }}" class="btn btn-outline-success">
                        Announce Chapter {{ $chapter->number }}
                    </a>

                    <!-- Delete Chapter -->
                    <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                        Delete
                    </a>
                    <form id="delete-form" action="{{ route('admin.content.comics.chapters.destroy', ['comic' => $comic->id, 'chapter' => $chapter->id]) }}" method="post" style="display: none;">
                        @method('delete')
                        @csrf
                    </form>

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
            <form action="{{ route('admin.content.comics.chapters.upload', ['comic' => $comic->id, 'chapter' => $chapter->id]) }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone" method="post">
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
            parallelUploads: 8,
            acceptedFiles: ".jpeg,.jpg,.png",
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

        let myDropzone = Dropzone.forElement(".dropzone");
        myDropzone.processQueue();
    </script>

@endsection