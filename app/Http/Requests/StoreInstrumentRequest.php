<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstrumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom' => 'required|min:2|max:55|string',
            'description' => 'required|string',
            'prix' => 'required|numeric|between:0,299.99',
            'stock'=> 'required|digits_between:1,2|integer',
            'image' => 'required|file|image|mimes:jpeg,jpg,png',
            'categorie_id' => 'required|exists:categories,id|integer',
            'rayon_id' => 'required|exists:rayons,id|integer',
            'marque_id' => 'required|exists:marques,id|integer',
            'promotion_id' => 'required|exists:promotions,id|integer'
        ];
    }
}
