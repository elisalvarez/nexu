<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

use App\Models\Models;

class PutModelsRequest extends FormRequest
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
            'average_price' => 'required|numeric|min:100000',
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
            'average_price.required' => 'El precio promedio es obligatorio.',
            'average_price.numeric' => 'El precio promedio debe ser un número. Por favor, elige un nombre diferente.',
            'average_price.min' => 'El precio promedio debe ser mayor a $100,000',
        ];
    }

    protected function withValidator(Validator $validator)
    {
    
        $validator->after(function ($validator) {
            $id = $this->route('id');
            
            $model = Models::where('sku', $id)->exists();

            if (!$model) 
                $validator->errors()->add('id_exists','El id del modelo proporcionado no existe.');
            
        });
    }

}
