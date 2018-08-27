<?php

namespace App\Modules\Admin\Http\Controllers\Content;

use App\Models\ComicChapter;
use App\Models\ComicVolume;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class VolumesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $saveVolume = ComicVolume::create([
            'folder_hash' => ComicVolume::makeFolderHash($request->input('order')),
            'name' => $request->input('name'),
            'name_native' => $request->input('name_native'),
            'order' => $request->input('order'),
            'comic_id' => $request->input('comic_id'),
            'language_id' => $request->input('language_id')
        ]);

        if ($saveVolume) {
            flash('Successfully created volume.')->success();
        }
        else {
            flash('Failed to create volume')->error();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ComicVolume $volume
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ComicVolume $volume)
    {
        // Delete chapters
        $chapters = ComicChapter::where('comic_volume_id', $volume->id)
            ->get();

        foreach ($chapters as $chapter) {
            $chapter->delete();
        }

        // Delete volume if chapters are gone
        if ($chapters->isEmpty()) {
            $volume->delete();

            flash('Successfully deleted volume.')->success();
        }
        else {
            flash('Failed to delete volume since there chapters linked to it.')->error();
        }

        return redirect()->back();
    }
}
