<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


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
    public function rules()
    {
        $feature = request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif,svg|max:8000' : 'required|mimes:jpeg,jpg,png,gif,svg|max:8000';
        
        return [
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'category' => 'required',
            'status' => 'boolean|nullable',
            'feature' => $feature,
            'created_at' => 'nullable'
        ];
    }
}
