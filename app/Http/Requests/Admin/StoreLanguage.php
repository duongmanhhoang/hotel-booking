<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguage extends FormRequest
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
           'name' => 'required|unique:languages',
           'short' => 'required|unique:languages',
           'file' => 'file',
        ];
    }
    public function messages(){
        return [
            'name.required' => __('messages.validate_name'),
            'short.required' => __('messages.validate_short'),
            'name.unique' => __('messages.Validate_unique'),
            'short.unique' => __('messages.Validate_unique'),
            'file.file' => __('messages.validate_file'),
        ];
    }
}
