<?php

namespace App\Http\Controllers;

use App\Models\ComicChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            Auth::user()->assign('admin');
        }

        $latest = ComicChapter::where('quiet_release', false)
            ->where('is_visible', true)
            ->orderByDesc('release_date')
            ->limit(8)
            ->get();

        return view('home')
            ->with(compact('latest'));
    }

    public function latest()
    {
        $latest = ComicChapter::where('quiet_release', false)
            ->where('is_visible', true)
            ->orderByDesc('release_date')
            ->simplePaginate(16);

        return view('latest')
            ->with(compact('latest'));
    }
}
