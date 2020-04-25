<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
          'name' => 'string|required|max:50|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.string'=>'Roles Name Must Be String',
						'name.required'=>'Roles Name Is Required',
						'name.max'=>'Roles name must be less than 50 characters',
						'name.min'=>'Roles name must grater than 3 characters'
        ];
    }
}
