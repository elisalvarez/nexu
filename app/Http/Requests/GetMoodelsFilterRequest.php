<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class GetMoodelsFilterRequest extends FormRequest
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
            'greater' => 'nullable|numeric|min:0',
            'lower' => 'nullable|numeric|min:0',
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
            'greater.numeric' => 'El parámetro greater debe ser un número.',
            'lower.numeric' => 'El parámetro lower debe ser un número.',
            'greater.min' => 'El parámetro greater no puede ser negativo.',
            'lower.min' => 'El parámetro lower no puede ser negativo.',
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $greater = $this->input('greater');
            $lower = $this->input('lower');
            
            if ($greater !== null && $lower !== null && $greater > $lower) {
                $validator->errors()->add('greater_lte_lower', 'El parámetro greater no puede ser mayor que el parámetro lower.');
            }
        });
    }

    
}
