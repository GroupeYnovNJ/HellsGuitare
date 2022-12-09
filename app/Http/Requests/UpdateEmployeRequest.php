<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
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
            'prenom' => 'required|min:2|max:55|string',
            'telephone' => 'required|min:5|max:20|string',
            'email'=> 'required|email:rfc',
            'rayon_id' => 'required|exists:rayons,id|integer'
        ];
    }
}
