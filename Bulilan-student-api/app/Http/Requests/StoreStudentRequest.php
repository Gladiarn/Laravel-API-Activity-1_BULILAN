<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        //rules for storing records. REQUIRED
        return [
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'age'       => 'required|integer|min:0',
            'nickname'  => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'FIRST NAME IS REQUIRED.',
            'lastname.required' => 'LAST NAME IS REQUIRED ALSO.',
            'age.required' => 'EXPECT AGE IS REQUIRED ALSO.',
            'nickname.required' => 'THIS IS ALSO REQUIRED.',
        ];
    }
}
