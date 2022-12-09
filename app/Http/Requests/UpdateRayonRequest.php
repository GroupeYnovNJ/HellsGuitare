<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRayonRequest extends FormRequest
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
            'id',
            'nom' => 'required|min:2|max:55|string',
            'nb_produits' => 'required|between:0,70|integer',
            'employe_id' => 'required|exists:employes,id|integer'
        ];
    }
}
