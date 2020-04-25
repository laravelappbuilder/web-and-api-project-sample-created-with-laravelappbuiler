<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
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
					'rating' => 'integer|between:1,5'
        ];
    }

    public function messages()
    {
        return [
            'rating.integer'=>'Rating Must Be integer',
						'rating.between'=>'Rating must be between 1 and 5'
        ];
    }
}
