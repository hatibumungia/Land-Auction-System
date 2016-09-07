<?php

namespace App\Http\Requests;


class CreatePlotAssignmentRequest extends Request
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
            'block_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'area_id.required' => 'Umesahau kuchagua eneo',
            'areas_type_id.required' => 'Umesahau kuchagua matumizi ya ardhi',
            'block_id.required' => 'Umesahau kuchagua kitalu'
        ];
    }
}
