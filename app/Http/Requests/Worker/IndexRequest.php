<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'email' => 'nullable|email',
            'age' => 'nullable|integer',
            'descriptions' => 'nullable|string',
            'is_married' => 'nullable|string',
            'from'=> 'nullable|integer',
            'to'=> 'nullable|integer',
        ];
    }
    public function messages() 
    {
        return [
            'name.string' => 'Поле имени должно быть строкой',
            'surname.string' => 'Поле фамилии должно быть строкой',
            'email.email' => 'Поле должно быть почтой',
            'to.integer'=> 'Поле должно быть числом',
            'from.integer'=> 'Поле должно быть числом',
        ] ;
    }
}
