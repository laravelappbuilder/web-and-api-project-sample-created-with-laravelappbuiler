<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
          'post_id' => 'required|integer',
					'comment' => 'required|string|min:3|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'comment.required'=>'Comment field is required',
						'comment.string'=>'Comment must be string',
						'comment.min'=>'Comment must be minimum 3 characters long',
						'comment.max'=>'Comment cannot be more than 2000 characters long'
        ];
    }
}
