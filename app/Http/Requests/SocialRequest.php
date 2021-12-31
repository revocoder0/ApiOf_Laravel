<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
        return [
            'image' => 'required|mimes:jpg,jpeg,png,webp|nullable',
            'name' => ['required', 'max:100', Rule::unique('socials')->ignore($this->social )],
            'link' => ['required', 'max:200', Rule::unique('socials')->ignore($this->social )],
        ];
    }
}
