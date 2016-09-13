<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAreaImageRequest extends Request
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
            'area_id' => 'required',
            'file_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'area_id.required' => 'Umesahau kuchagua eneo',
            'file_name.required' => 'Umesahau kuchagua ramani ya eneo'
        ];
    }
}
