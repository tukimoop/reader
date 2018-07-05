<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Requests\Settings\UpdateGeneral;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function general()
    {
        return view('admin::system.general');
    }

    public function updateGeneral(UpdateGeneral $request)
    {
        setting([
            'general.site.name' => $request->input('site_name'),
            'general.site.homepage_url' => $request->input('homepage_url'),
            'general.meta.description' => $request->input('meta_description'),
            'general.meta.keywords' => $request->input('meta_keywords'),
        ])->save();

        flash('Successfully updated general settings.')->success();

        return redirect()->back();
    }

    public function security()
    {
        return view('admin::system.security');
    }

    public function performance()
    {

    }
}
