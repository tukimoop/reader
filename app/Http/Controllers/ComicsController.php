<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\ComicChapter;
use App\Models\ComicVolume;
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
     * @param Comic $slug
     * @param ComicVolume $volume
     * @param ComicChapter $chapter
     */
    public function read(Comic $slug, $volume, $chapter)
    {

    }
}
