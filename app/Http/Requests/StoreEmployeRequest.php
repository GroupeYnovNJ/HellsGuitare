<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
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
            'prenom' => 'required|min:2|max:55|string',
            'telephone' => 'required|numeric|digits:10',
            'email'=> 'required|email:rfc',
            'rayon_id' => 'required|exists:rayons,id|integer'
        ];
    }
}
