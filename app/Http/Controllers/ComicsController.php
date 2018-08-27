<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\ComicChapter;
use App\Models\ComicVolume;
use App\Models\Language;
use Illuminate\Http\Request;

class ComicsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comics = Comic::where('is_visible', true)
            ->simplePaginate(16);

        return view('comics.index')
            ->with(compact('comics'));
    }

    /**
     * @param Comic $comic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Comic $comic)
    {
        return view('comics.show')
            ->with(compact('comic'));
    }

    /**
     * @param Comic $comic
     * @param Language $language
     * @param ComicVolume $volume
     * @param ComicChapter $chapter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read(Comic $comic, Language $language, $volume, $chapter)
    {
        $volume = $comic->volumes()->where('language_id', $language->id)
            ->where('order', $volume)
            ->first();

        $currentChapter = ComicChapter::where('comic_volume_id', $volume->id)
            ->where('comic_id', $comic->id)
            ->where('number', $chapter)
            ->first();

        $images = $currentChapter->images()->orderBy('image_url')->get();

//        dd($images);

        return view('comics.read')
            ->with(compact('comic', 'volume', 'currentChapter', 'images'));
    }
}
