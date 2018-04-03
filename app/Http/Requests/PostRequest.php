<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
            $rules =
                [
                    'title'             => 'required',
                    'slug'              => 'required',
                    'description'       => 'required',
                    'main_keyword'      => 'required',
                    'lsi_keywords'      => 'required',
                    'category'          => 'required',
                    'featured_image'    => 'required|image|max:2048',
                    'images.*'          => 'image|max:2048',
                ];
            return $rules;
    }
}
