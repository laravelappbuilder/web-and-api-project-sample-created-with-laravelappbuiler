<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
          'name' => 'required|string|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tag name is required',
						'name.string'=>'Tag field must be string',
						'name.min'=>'Tag name must be minimum 3 characters long',
						'name.max'=>'Tag name cannot be more than 50 characters long'
        ];
    }
}
