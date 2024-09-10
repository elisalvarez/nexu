<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

use App\Models\Models;
use App\Models\Brands;

class StoreBrandModelsRequest extends FormRequest
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

        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($id) {

                    $brand = Brands::where('brand_id', $id)->exists();

                    if (!$brand) $fail('La marca con el ID proporcionado no existe.');
                    
                    $model = Models::where('name', $value)
                                    ->where('brand_id', $id)
                                    ->exists();

                    if ($model) $fail('El nombre del modelo ya existe para esta marca.');
                }
            ],
            
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
            'name.required' => 'El nombre de la marca es obligatorio.',
            'name.unique' => 'El nombre de la marca que intentas usar ya está registrado. Por favor, elige un nombre diferente.',
            'average_price.required' => 'El precio promedio es obligatorio.',
            'average_price.numeric' => 'El precio promedio debe ser un número. Por favor, elige un nombre diferente.',
            'average_price.min' => 'El precio promedio debe ser mayor a $100,000',
        ];

    }
}
