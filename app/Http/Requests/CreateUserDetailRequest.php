<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserDetailRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'region' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'house_number' => 'required',
            'address' => 'required',
            'photo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Jina la kwanza linahitajika',
            'last_name.required' => 'Jina la mwisho linahitajika',
            'region.required' => 'Mkoa unahitajika',
            'district.required' => 'Wilaya inahitajika',
            'ward.required' => 'Kata inahitajika',
            'house_number.required' => 'Namba ya nyumba inahitajika',
            'address.required' => 'Unuani inahitajika',
            'photo.required' => 'Pasipoti inahitajika',
        ];
    }
}
