<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use const true;

class PostCreateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => ['required','unique:posts'],
            'cat_id'=>['required'],
            'short_des'=>['required'],
            'long_des'=>['required'],
            'tags'=>['required'],
            'view_image'=>['required','mimes:jpg,png,jpeg'],
            'main_image'=>['required','mimes:jpg,png,jpeg'],
        ];
    }
}
