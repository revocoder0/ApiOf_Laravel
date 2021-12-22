<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required|max:200|min:2',
            'email' => 'required|email',
            'description'=>'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:200',
            'coverphoto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:200',
        ];
    }
}
