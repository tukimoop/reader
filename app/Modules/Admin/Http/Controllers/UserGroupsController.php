<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

use App\Http\Controllers\Controller;

class UserGroupsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userGroups = Role::all();

        return view('admin::members.groups.index')
            ->with(compact('userGroups'));
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        $abilities = Ability::all();

        // Show alert if current role has access to everything
        $allowEverything = $role->abilities()
            ->where('name', '*')
            ->exists();

        if ($allowEverything) {
            flash('This role has access to everything.')->info()->important();
        }

        return view('admin::members.groups.show')
            ->with(compact('role', 'abilities'));
    }
}
