@extends('layouts.app')

@section('pageTitle', $comic->name . ' - Volume ' . $volume->order . ' Chapter ' . $currentChapter->number)

@section('content')

    <h4>
        <a href="{{ route('reader.comics.show', $comic->slug) }}">{{ $comic->name }}</a> -
        Volume {{ $volume->order }} Chapter {{ $currentChapter->number }}
    </h4>

    @if ($images->isEmpty())
        <div class="alert alert-info">
            This chapter is in the process of being uploaded.
        </div>
    @endif

    @foreach ($images as $image)

            <img src="{{ $image->image_url }}" class="img-fluid mx-auto d-block">

    @endforeach

    <div class="row mt-2">
        <div class="col-auto">
            <a href="{{ route('reader.comics.show', $comic->slug) }}" class="btn btn-primary">Back to {{ $comic->name }}</a>
        </div>
    </div>

@endsection