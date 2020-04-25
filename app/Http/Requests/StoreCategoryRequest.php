<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
          'name' => 'required|string|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Category name is required',
						'name.string'=>'Category name must be string',
						'name.min'=>'Category must be minimum 3 characters long',
						'name.max'=>'Category name cannot be more than 30 characters'
        ];
    }
}
