<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function general()
    {
        return view('admin::system.general');
    }

    public function security()
    {

    }

    public function performance()
    {

    }
}
