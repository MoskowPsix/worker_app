<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'age' => 'nullable|integer',
            'descriptions' => 'nullable|string',
            'is_married' => 'nullable|boolean',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Поле имени необходимо для заполнения',
            'name.string' => 'Поле имени должно быть строкой',
            'surname.required' => 'Поле фамилии необходимо для заполнения',
            'surname.string' => 'Поле фамилии должно быть строкой',
            'email.required' => 'Поле почты необходимо для заполнения',
            'email.email' => 'Поле должно быть почтой',
            'age.integer'=> 'Поле должно быть числом',
            'age.string'=> 'Поле должно быть строкой',


        ] ;
    }
}
