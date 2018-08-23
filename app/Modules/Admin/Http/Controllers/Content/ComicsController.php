<?php

namespace App\Modules\Admin\Http\Controllers\Content;

use App\Models\Comic;
use App\Models\ComicStatus;
use App\Models\Genre;
use App\Modules\Admin\Http\Requests\Content\StoreComic;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class ComicsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comics = Comic::select('id', 'name', 'created_at', 'is_visible', 'thumbnail_url')->get();

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
        $comic->load('chapters.volumes');

        return view('admin::content.comics.show')
            ->with(compact('comic'));
    }

    /**
     * @param StoreComic $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreComic $request)
    {
        $folderHash = Comic::makeFolderHash($request->input('name'));
        $comicPath = "public/comics/{$folderHash}";
        $thumbnailUpload = $request->file('thumbnail')->store($comicPath . '/thumbnails');
        $coverUpload = $request->file('cover')->store($comicPath . '/covers');

        // Set visibility of both thumbnail and cover
        Storage::setVisibility($thumbnailUpload, 'public');
        Storage::setVisibility($coverUpload, 'public');

        // Only use the UUID, just in case the comic name is really long.
        if (strlen($folderHash) > 255) {
            $folderHash = Uuid::generate()->string;
        }

        $comic = Comic::create([
            'folder_hash' => $folderHash,
            'name' => $request->input('name'),
            'name_native' => $request->input('name_native'),
            'description' => $request->input('description'),
            'comic_status_id' => $request->input('comic_status_id'),
            'thumbnail_url' => Storage::url($thumbnailUpload),
            'cover_url' => Storage::url($coverUpload),
            'is_mature' => $request->input('is_mature') ?? false,
            'is_visible' => $request->input('is_visible') ?? false,
        ]);

        // Associate genres
        foreach ($request->input('genres') as $key => $genreId) {
            $genre = Genre::find($genreId);
            $comic->genres()->attach($genre);
        }

        flash('Successfully created comic.')->success();

        return redirect()->route('admin.content.comics');
    }
}
