<?php

// app/Http/Requests/ZipcodeRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZipcodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'zipcode' => 'required|numeric|digits:5|unique:zipcodes,zipcode',
        ];
    }

    public function messages()
    {
        return [
            'zipcode.required' => 'The field Zip Code is required.',
            'zipcode.numeric' => 'The Zip Code must be numeric.',
            'zipcode.digits' => 'The Zip Code requires 5 positions.',
            'zipcode.unique' => 'The Zip Code has already been taken.',
        ];
    }
}


