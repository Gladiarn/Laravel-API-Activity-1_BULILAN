<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        //this is my patch request rules. NOT REALLY REQUIRED
        return [
            'firstname' => 'sometimes|string|max:255',
            'lastname' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:0',
            'nickname' => 'sometimes|string|max:255'
        ];
    }

}
