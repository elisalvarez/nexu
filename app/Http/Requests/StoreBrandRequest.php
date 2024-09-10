<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|unique:brands'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        
        throw new HttpResponseException(response()->json([
            'error' => $errors->first(),
        ], 422));
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la marca es obligatorio.',
            'name.unique' => 'El nombre de la marca que intentas usar ya está registrado. Por favor, elige un nombre diferente.',
        ];

    }
}
