<?php

namespace App\Modules\Admin\Http\Controllers\Content;

use App\Models\Comic;
use App\Models\ComicChapter;
use App\Models\ComicChapterImage;
use App\Models\ComicVolume;
use App\Notifications\DiscordAnnouncement;
use DiscordWebhooks\Client;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class ChaptersController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        $volumes = ComicVolume::where('comic_id', $comic->id)->get();

        return view('admin::content.comics.chapter.create')
            ->with(compact('volumes', 'comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Comic $comic
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, Comic $comic)
    {
        ComicChapter::create([
            'folder_hash' => Uuid::generate()->string,
            'name' => $request->input('name'),
            'name_native' => $request->input('name_native'),
            'number' => $request->input('number'),
            'release_date' => $request->input('release_date'),
            'comic_id' => $comic->id,
            'comic_volume_id' => $request->input('comic_volume_id'),
            'quiet_release' => $request->input('quiet_release') ?? false,
            'is_visible' => $request->input('is_visible') ?? true
        ]);

        flash('Successfully created chapter.')->success();

        return redirect()->back();
    }

    /**
     * @param Comic $comic
     * @param ComicChapter $chapter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Comic $comic, ComicChapter $chapter)
    {
        return view('admin::content.comics.chapter.show')
            ->with(compact('comic', 'chapter'));
    }

    /**
     * @param Request $request
     * @param Comic $comic
     * @param ComicChapter $chapter
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Comic $comic, ComicChapter $chapter)
    {
        // Delete all images for this chapter
        $path = "public/comics/{$comic->folder_hash}/chapters/{$chapter->folder_hash}";
        $deleteImages = Storage::deleteDirectory($path);

        if (!$deleteImages) {
            flash('Unable to delete chapters image directory.')->error();
            return redirect()->back();
        }

        $chapter->images()->delete();
        $chapter->forceDelete();

        flash('Successfully deleted chapter')->success();

        return redirect()->route('admin.content.comics.show', $comic->id);
    }

    /**
     * Handles uploading from the admin panel dropzone input.
     *
     * @param Request $request
     * @param Comic $comic
     * @param ComicChapter $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request, Comic $comic, ComicChapter $chapter)
    {
        try {
            $uploadPath = "public/comics/{$comic->folder_hash}/chapters/{$chapter->folder_hash}";
            $uploadImage = $request->file('file')->storePubliclyAs($uploadPath, $request->file('file')->getClientOriginalName());

            if (!$uploadImage) {
                return response()->json('Upload failed', 400);
            }

            // Save image
            ComicChapterImage::create([
                'comic_id' => $comic->id,
                'comic_chapter_id' => $chapter->id,
                'image_url' => Storage::url($uploadImage)
            ]);

            return response()->json('success', 201);
        }
        catch (\Exception $exception) {
            return response()->json('Upload failed due to internal error.', 500);
        }
    }

    /**
     * @param Request $request
     * @param Comic $comic
     * @param ComicChapter $chapter
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function announce(Request $request, Comic $comic, ComicChapter $chapter)
    {
        $webhook = new Client(env('DISCORD_WEBHOOK'));
        $websiteName = setting('general.site.name');

        $message = $comic->name . ' Volume' . $chapter->volume->order . ' Chapter ' . $chapter->number . " is now available on {$websiteName}.";
        $url = route('reader.comics.chapter.show', [
            'comic' => $comic->slug,
            'language' => $chapter->volume->language->short_code,
            'volume' => $chapter->volume->order,
            'chapter' => $chapter->number
        ]);

        $webhook->message('@here')->send();
        $webhook->message($message)->send();
        $webhook->message($url)->send();

        flash('Successfully sent Discord announcement.')->success();

        return redirect()->back();
    }
}
