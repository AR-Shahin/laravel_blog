<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use const true;

class AddAdminRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required','unique:admins','email'],
            'phone' => ['required'],
            'address' => ['required'],
            'password' => ['required'],
            'status' => ['required'],
            'image' => ['required','mimes:jpg,png,jpeg','max:5000'],
        ];
    }
}
