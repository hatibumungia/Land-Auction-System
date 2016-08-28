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
            'middle_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email_address' => 'required|email|max:255|unique:user_details',
            'phone_number' => 'required|max:13|unique:user_details',
            'password' => 'required|min:6|max:32|confirmed',
        ];
    }
}
