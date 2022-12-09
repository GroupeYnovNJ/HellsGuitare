<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionRequest extends FormRequest
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
            'coupon' => 'required|string',
            'reduction' => 'required|between:10,80|integer',
            'date_debut' => 'required|date|after_or_equal:now',
            'date_fin'=> 'required|date|after:date_debut',
        ];
    }
}
