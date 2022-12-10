<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'heading' => 'required',
            'image_file' => 'sometimes|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'heading.required' => 'Please enter a heading',
            'image_file.required' => 'Please choose an image',
            'image_file.image' => 'Please choose an image',
            'image_file.mimes' => 'Please choose an image of jpeg,png,jpg,gif,webp formats',
            'image_file.uploaded' => 'Please choose an image less than 1MB',
        ];
    }
}
