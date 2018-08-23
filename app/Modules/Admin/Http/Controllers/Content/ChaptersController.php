<?php

namespace App\Modules\Admin\Http\Controllers\Content;

use App\Models\Comic;
use App\Models\ComicVolume;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

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

        return view('admin::content.comics.chapter.index')
            ->with(compact('volumes', 'comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
