<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
class UserinfoRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'nationality' => 'required',
            'dob' => 'required',
            'education_background' => 'required',
            'mode_of_contact' => 'required'
        ];
    }
}
