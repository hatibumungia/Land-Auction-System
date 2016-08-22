<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBlockAssignmentRequest extends Request
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
            'areas_type_id' => 'required',
            'block_id' => 'required',
            'file_name' => 'required|image|max:200'
        ];
    }
}
