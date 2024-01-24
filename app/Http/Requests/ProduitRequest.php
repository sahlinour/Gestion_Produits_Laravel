<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            
                'libelle' => 'required|string',
                'marque' => 'required|string',
                'prix' => 'required|numeric',
                'stock' => 'required|integer|min:1|max:500',
                'image' => 'required|image|mimes:png,jpg,jpeg',
          
        ];
    }
    
    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est requis.',
            'marque.required' => 'La marque est requise.',
            'image.required' => 'L\'image est requise.',
        ];
    }
}
