@extends('layouts.app')

@section('pageTitle', 'Latest')

@section('content')

    <h4>Latest</h4>

    <div class="row">

        @foreach ($latest as $chapter)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-img-actions mx-1 mt-1">
                        <img class="card-img img-fluid" src="{{ $chapter->volume->comic->thumbnail_url }}" alt="">
                        <div class="card-img-actions-overlay card-img">
                            <a href="{{ route('reader.comics.show', $chapter->volume->comic->slug) }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                                <i class="icon-book3"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex align-items-start flex-nowrap">
                            <div>
                                <a href="{{ route('reader.comics.show', $chapter->volume->comic->slug) }}" class="text-default font-weight-semibold h6">{{ $chapter->volume->comic->name }}</a>

                                <span>Released {{ $chapter->release_date->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('reader.comics.chapter.show', ['comic' => $chapter->volume->comic->slug, 'language' => $chapter->volume->language->short_code, 'volume' => $chapter->volume->order, 'chapter' => $chapter->number]) }}" class="btn btn-default btn-block">Read Chapter {{ $chapter->number }}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{ $latest->links() }}
@endsection
