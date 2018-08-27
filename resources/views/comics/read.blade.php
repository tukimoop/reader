@extends('layouts.app')

@section('pageTitle', $comic->name . ' - Volume ' . $volume->order . ' Chapter ' . $currentChapter->number)

@section('content')

    <h4>Chapter</h4>

    @if ($images->isEmpty())
        <div class="alert alert-info">
            This chapter is in the process of being uploaded.
        </div>
    @endif

    @foreach ($images as $image)

            <img src="{{ $image->image_url }}" class="img-fluid mx-auto d-block">

    @endforeach

@endsection