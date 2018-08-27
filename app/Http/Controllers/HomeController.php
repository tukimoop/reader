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
//        Auth::user()->assign('admin');
//        Auth::user()->assign('content-manager');

        $latest = ComicChapter::where('quiet_release', false)
            ->where('is_visible', true)
            ->orderBy('release_date')
            ->limit(8)
            ->get();

        return view('home')
            ->with(compact('latest'));
    }
}
