@extends('layouts.app')

@section('pageTitle', 'Comics')

@section('content')

    <h4>Comics</h4>

    <div class="row">

        @foreach ($comics as $comic)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-img-actions mx-1 mt-1">
                        <img class="card-img img-fluid" src="{{ $comic->thumbnail_url }}" alt="">
                        <div class="card-img-actions-overlay card-img">
                            <a href="{{ route('reader.comics.show', $comic->slug) }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                                <i class="icon-book3"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex align-items-start flex-nowrap">
                            <div>
                                <a href="{{ route('reader.comics.show', $comic->slug) }}" class="text-default font-weight-semibold h6">{{ $comic->name }}</a>
                                <br>
                                <span class="mt-4">Added {{ $comic->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('reader.comics.show', $comic->slug) }}" class="btn btn-default btn-block">View</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{ $comics->links() }}
@endsection
