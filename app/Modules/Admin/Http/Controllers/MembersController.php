<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;

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

    public function show(User $user)
    {
        $roles = Role::all();


        return view('admin::members.show')
            ->with(compact('user', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->retract($user->roles()->first()->name);
        $user->assign($request->input('role'));

        flash('Successfully updated role for that user.')->success();

        return redirect()->back();
    }
}
