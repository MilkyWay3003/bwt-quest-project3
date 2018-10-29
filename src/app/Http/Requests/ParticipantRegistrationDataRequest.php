<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRegistrationDataRequest extends FormRequest
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
            'firstname' => 'required|string|min:2|max:80',
            'lastname' => 'required|string|min:2|max:80',
            'birthdate'=> 'required',
            'reportsubject' =>'required|string|min:2|max:255',
            'country' =>'required|string|max:80',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:80|unique:participants',                        
        ];
    }
}
