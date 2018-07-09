<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;

class MembersController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $members = User::paginate(24);

        return view('admin::members.index')
            ->with(compact('members'));
    }
}
