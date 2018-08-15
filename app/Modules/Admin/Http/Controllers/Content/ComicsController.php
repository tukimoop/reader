<?php

namespace App\Modules\Admin\Http\Controllers\Content;

use App\Models\Comic;
use App\Models\ComicStatus;
use App\Models\Genre;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ComicsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comics = Cache::remember('admin_comics', 5, function () {
            return Comic::select('id', 'name', 'created_at', 'is_visible')->get();
        });

        return view('admin::content.comics.index')
            ->with(compact('comics'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $comicStatuses = ComicStatus::all();
        $genres = Genre::all();

        return view('admin::content.comics.create')
            ->with(compact('comicStatuses', 'genres'));
    }

    /**
     * @param Comic $comic
     * @return Comic
     */
    public function show(Comic $comic)
    {
        $comic->load('chapters.volume');

        return view('admin::content.comics.show')
            ->with(compact('comic'));
    }
}
