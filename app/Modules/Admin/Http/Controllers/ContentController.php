<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\Comic;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function comics()
    {
        $comics = Comic::all();

        return view('admin::content.comics')
            ->with(compact('comics'));
    }
}
