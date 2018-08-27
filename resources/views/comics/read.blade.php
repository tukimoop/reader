<script id="dsq-count-scr" src="//soda-scans.disqus.com/count.js" async></script>
@extends('layouts.app')

@section('pageTitle', $comic->name . ' - Volume ' . $volume->order . ' Chapter ' . $currentChapter->number)

@section('content')

    <div class="row">

        @foreach ($images as $image)

            <img src="{{ $image->image_url }}" />

        @endforeach

    </div>

@endsection