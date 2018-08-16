<?php

namespace App\Modules\Admin\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreComic extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->can('manage-comics')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'name_native' => 'required|string|min:1|max:255',
            'comic_status_id' => 'required|integer|exists:comic_statuses,id',
            'is_mature' => 'boolean',
            'is_visible' => 'boolean',
            'thumbnail' => 'required|image'
        ];
    }
}
