<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function comics()
    {
        return view('admin::content.comics');
    }
}
