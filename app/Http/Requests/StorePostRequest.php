<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
          'category_id' => 'required|integer',
					'coverimage' => 'image',
					'title' => 'required|string|min:3|max:191',
					'body' => 'required|string|min:3|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'coverimage.image'=>'Cover Image must be image',
						'title.required'=>'Title is required',
						'title.string'=>'Title must be string',
						'title.min'=>'Title must be minimum 3 characters',
						'title.max'=>'Title cannot be more than 190 characters long',
						'body.required'=>'Body field is required',
						'body.string'=>'Body field must be string',
						'body.min'=>'Body must be minimum 3 characters long',
						'body.max'=>'Body cannot be more than 10000 characters long'
        ];
    }
}
