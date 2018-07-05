<?php

namespace App\Modules\Admin\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateGeneral extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->can('update-general-settings')) {
            return true;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'bail|required|string|min:2',
            'meta_description' => 'bail|string|min:12|max:200',
            'meta_keywords' => 'bail|string|min:2|max:255',
            'homepage_url' => 'nullable|url|min:2|max:255',
        ];
    }
}
