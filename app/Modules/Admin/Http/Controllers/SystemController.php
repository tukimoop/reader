<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Requests\Settings\UpdateGeneral;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Http\Requests\Settings\UpdateSecurity;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function general(Request $request)
    {
        if (!$request->user()->isAn('admin')) {
            return redirect()->back();
        }

        return view('admin::system.general');
    }

    /**
     * @param UpdateGeneral $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function security()
    {
        return view('admin::system.security');
    }

    /**
     * @param UpdateSecurity $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSecurity(UpdateSecurity $request)
    {
        setting([
            'security.registration.min_name_length' => $request->input('min_username_length'),
            'security.recaptcha.enabled' => $request->input('recaptcha_enabled'),
        ])->save();

        flash('Successfully updated security settings.')->success();

        return redirect()->back();
    }

    public function performance()
    {

    }

    public function updatePerformance()
    {

    }
}
