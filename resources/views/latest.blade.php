@extends('layouts.app')

@section('pageTitle', 'Latest')

@section('content')

    <h4>Latest</h4>

    <div class="row">

        @foreach ($latest as $chapter)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-img-actions mx-1 mt-1">
                        <img class="card-img img-fluid" src="https://cdn.discordapp.com/attachments/371771054940487686/483650043656667143/hit_mssss.jpg" alt="">
                        <div class="card-img-actions-overlay card-img">
                            <a href="{{ route('reader.comics.show', $chapter->volume->comic->slug) }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                                <i class="icon-book3"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex align-items-start flex-nowrap">
                            <div>
                                <h6 class="font-weight-semibold mr-2">{{ $chapter->volume->comic->name }}</h6>
                                <span>Released {{ $chapter->release_date->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ env('APP_URL') }}/read/{{ $chapter->volume->comic->slug }}/{{ $chapter->volume->order }}/{{ $chapter->number }}" class="btn btn-default btn-block">Read Chapter {{ $chapter->number }}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{ $latest->links() }}
@endsection
