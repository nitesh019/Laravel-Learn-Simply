<?php

namespace App\Http\Requests;

use App\Rules\YearCheck;
use Illuminate\Foundation\Http\FormRequest;

class CustomFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'username'=>'required|uppercase|min:4',
           'password'=>'required|min:4',
           'year'=> ['required', new YearCheck],

        ];
    }

    public function messages(){
        // return[
        //     'username.required' => 'username name should not empty',
        //     'password.required' => 'password should not empty',
        //      'username.min' => 'min 4 char',
        //      'password.min'=> 'min 6 characters'
        // ];

        return[
            'required' => ':attribute should not empty',
             'username.min' => 'min 4 char',
             'password.min'=> 'min 6 characters',
             'uppercase' => 'should upper',
             'YearCheck' => 'Year should be valid'
        ];

    }
}
