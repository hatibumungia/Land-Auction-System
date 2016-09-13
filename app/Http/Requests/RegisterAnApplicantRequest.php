<?php

namespace App\Http\Requests;


class RegisterAnApplicantRequest extends Request
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

        // TODO : validation of phone number

        return [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email_address' => 'required|email|max:255|unique:user_details',
            'phone_number' => 'required|max:13|unique:user_details',
            'password' => 'required|min:6|max:32|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Jina la kwanza linahitajika',
            'last_name.required' => 'Jina la mwisho linahitajika',
            'email_address.required' => 'Barua pepe inahitajika',
            'email_address.unique' => 'Anuani ya barua pepe imeshatumika. Weka nyingine.',
            'phone_number.required' => 'Namba ya simu inahitajika',
            'phone_number.unique' => 'Namba ya simu imeshatumika. Weka nyingine',
            'password.required' => 'Nywila inahitajika',
            'password.confirmed' => 'Nywila hazifanani'
        ];
    }

}
