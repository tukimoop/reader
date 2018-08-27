<script id="dsq-count-scr" src="//soda-scans.disqus.com/count.js" async></script>
@extends('layouts.app')

@section('pageTitle', $comic->name)

@section('content')

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center card-img-top">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{ $comic->thumbnail_url }}" width="170" height="170" alt="">
                        <div class="card-img-actions-overlay rounded-circle">
                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                <i class="icon-plus3"></i>
                            </a>
                            <a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>

                    <h6 class="font-weight-semibold mb-0">{{ $comic->name }}</h6>
                    <span class="d-block opacity-75">Added {{ $comic->created_at->diffForHumans() }}</span>

                    <div class="mt-2">
                        @foreach ($comic->genres as $genre)
                            <span class="badge badge-primary">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="text-semibold"><i class="icon-paragraph-left3 mr-2"></i> Synopsis</h6>
                    {{ $comic->description or 'N/A' }}
                </div>
            </div>
            <!-- /navigation -->
        </div>

        <!-- Chapters -->
        <div class="col-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Chapters</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <ul class="media-list media-list-linked media-list-bordered">

                    @foreach ($comic->volumes as $volume)
                        <li class="media bg-light font-weight-semibold py-2">Volume {{ $volume->order }}@if($volume->name) - {{ $volume->name }} @endif</li>

                        @foreach ($volume->chapters as $chapter)
                        <li>
                            <a href="{{ route('reader.comics.chapter.show', ['comic' => $comic->slug, 'language' => $volume->language->short_code, 'volume' => $volume->order, 'chapter' => $chapter->number]) }}" class="media">
                                <div class="mr-3">
                                    <img src="{{ $comic->thumbnail_url }}" class="rounded-circle" width="44" height="44" alt="">
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">Chapter {{ $chapter->number }}@if($chapter->name) - {{ $chapter->name }} @endif</h6>
                                    Released {{ $chapter->release_date->diffForHumans() }}
                                </div>
                            </a>
                        </li>
                        @endforeach

                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection