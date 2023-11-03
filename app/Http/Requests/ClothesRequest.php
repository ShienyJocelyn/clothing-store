<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ClothesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id', 
            'category' => 'required|exists:categories,id', 
            'product_name' => 'required|max:255', 
            'price' => 'required|max:255',
            'description' => 'required|max:2000', 
            'image' => 'nullable|image', 
            'seller_contact' => 'required|max:2000'
        ];
    }
}
