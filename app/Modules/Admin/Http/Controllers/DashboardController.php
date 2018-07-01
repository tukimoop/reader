<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Silber\Bouncer\Bouncer;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

//        $user->assign('admin');

        return view('admin::dashboard.index');
    }
}
