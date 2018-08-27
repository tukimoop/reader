@extends('layouts.app')

@section('pageTitle', $comic->name . ' - Volume ' . $volume->order . ' Chapter ' . $currentChapter->number)

@section('content')

    <h4>Chapter</h4>

    <div class="row">
        <div class="col-12">
            @if ($images->isEmpty())
                <div class="alert alert-info">
                    This chapter is in the process of being uploaded.
                </div>
            @endif

            @foreach ($images as $image)

                    {{ $image->image_url }}

            @endforeach
        </div>
    </div>

@endsection